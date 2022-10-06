<?php

namespace App\Http\Controllers;

use App\Http\Requests\PropertyRequest;
use Illuminate\Http\Request;

use App\Models\PropertyListing;
use App\Models\PropertyType;
use Illuminate\Support\Str;

class PropertyController extends Controller{

    public function listPoperty(){

        if(request()->ajax()){
            $request = request()->all();
            $offset = $request['start'];
            $limit = $request['length'];

            $fields = [
                'uuid',
                'county',
                'country',
                'town',
                'address',
                'image_full',
                'image_thumbnail'
            ];

            $propertiesRaw = PropertyListing::select( $fields);

            if (!empty($request['search']['value'])) {
                $searchValue = trim($request['search']['value']);
                $propertiesRaw->where(function ($query) use ($fields, $searchValue) {
                    foreach ($fields as $column) {
                        if ($column == 'image_full' || $column == 'image_thumbnail') {
                            continue;
                        } else {
                            $query->orWhere($column, "like", "$searchValue");
                        }
                    }
                });
            }

            $recordsFiltered  = $propertiesRaw->count();

            $properties = $propertiesRaw->offset($offset)->limit($limit)->get();

            $results = [
                "draw" => intval($request['draw']),
                "recordsTotal" => PropertyListing::count(),
                "recordsFiltered" => $recordsFiltered
            ];
            
            if ($properties->count()) {
                foreach($properties as $item){
                    $rows =[
                        $item->county,
                        $item->country,
                        $item->town,
                        $item->address,
                        "<img width=100 height=100 src='".$item->image_full."'>",
                        "<img width=50 height=50 src='".$item->image_thumbnail."'>",
                        "<a class='btn btn-danger' href=".( route("property.delete",[$item->uuid])).">Delete</a>",
                        "<a class='btn btn-success' href=".( route("property.edit",[$item->uuid])).">Edit</a>"
                    ];
        
                    $results['data'][] = $rows;
                }
                
            } else {

                $results['data'] = [];
            }

            echo json_encode($results);

        }
        else
            return view('property.list-properties');
    }

    public function createProperty(){

        $propertyTypes = PropertyType::select('id','title')->get();
        return view('property.add-property',compact('propertyTypes'));

    }

    public function saveProperty(PropertyRequest $request){

        $imageFull = $request->file('image_full');
        $filePath = $imageFull->store('images');

        $destinationPath = storage_path('app/');
        $img = \Image::make($imageFull->path());
        $img->resize(100, 100);
        $thumnailPath = "thumbnails/".time().'.'.$imageFull->extension();
        $img->save($destinationPath.$thumnailPath,50);

        $this->createStorageLink($thumnailPath,$filePath);

        PropertyListing::create([
            'uuid' => Str::random(35),
            'county'  => $request->county,
            'country'  => $request->country,
            'town'  => $request->town,
            'description'  => $request->description,
            'address'  => $request->address,
            'image_full'  => $filePath,
            'image_thumbnail'  => $thumnailPath,
            'num_bedrooms'  => $request->num_bedrooms,
            'num_bathrooms'  => $request->num_bathrooms,
            'price'  => $request->price,
            'for'  => $request->for,
            'postcode' => $request->postcode,
            'property_type_id'  => $request->property_type_id,
            'created_at'  => date('Y-m-d h:i:s'),
            'updated_at'  => date('Y-m-d h:i:s')
        ]);
        
        return redirect()->back()->with('success', "Property Saved Successfully");
    }

    public function createStorageLink(&$thumnailPath,&$filePath){

        $thumnailPath = (config('app.url')."property_images/".$thumnailPath);
        $filePath = (config('app.url')."property_images/".$filePath);

    }

    public function editProperty($uuid){
        
        $property = PropertyListing::where('uuid',$uuid)->first();
        if(! $property)
            return view('property.list-properties')->with('error', "Property is not available");
        $property_types = PropertyType::select('id','title')->get();

        return view('property.edit-property',compact('property_types','property'));
    }

    public function updateProperty($uuid,Request $request){
        $editData = $request->except('_token');

        PropertyListing::where('uuid',$uuid)->update($editData);

        return redirect()->back()->with('success', "Property Updated Successfully");
    }

    public function deleteProperty($uuid){

        $property = PropertyListing::where('uuid',$uuid)->first();
        if(! $property)
            return view('property.list-properties')->with('error', "Property is not available");

        PropertyListing::where('uuid',$uuid)->delete();

        return redirect()->back()->with('success', "Property Deleted Successfully");
    }

}

