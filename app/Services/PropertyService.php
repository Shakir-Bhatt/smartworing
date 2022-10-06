<?php

namespace App\Services;

use App\Models\PropertyListing;
use App\Models\PropertyType;
use GuzzleHttp\Client;
use Illuminate\Support\Str;

class PropertyService {

    private $client,$apiBaseUrl,$endPoint,$apiKey;

    public function __construct(){
        $this->client = new Client();

        $this->apiBaseUrl   = config('property.apis.property.base_url');
        $this->endPoint     = config('property.apis.property.end_points.listing');
        $this->apiKey       = config('property.apis.property.api_key');

    }

    public function syncProperties($page=1):bool {
        
        $apiData = $this->client->get(
            $this->apiBaseUrl.$this->endPoint, 
            [
                'query' => [
                'api_key' => $this->apiKey,
                'page' => $page
            ]
        ]);

        $responseBody = $apiData->getBody();

        $properties = $this->getArrayFromJson($responseBody->getContents());

        if(!$properties){
            // Log not valid json
            return false;
        }    

        $this->insertPropertyListing($properties['data']);
        return true;
    }

    private function getArrayFromJson($str){
        return json_decode($str,1);
        if(Str::isJson($str)){
            return json_decode($str,1);
        }
        return false;
    }

    /**
     * Insert data in db
     */
    private function insertPropertyListing($properties):void  {
        foreach($properties as $property){
            $id = PropertyType::find($property['property_type_id']);
            if(!$id){
                PropertyType::create($property['property_type']);
            }

            PropertyListing::updateOrCreate([
                'uuid'  => $property['uuid']
            ],
            [
                'uuid'              => $property['uuid'],
                'county'            => $property['county'],
                'country'           => $property['country'],
                'town'              => $property['town'],
                'description'       => $property['description'],
                'address'           => $property['address'],
                'latitude'          => $property['latitude'],
                'longitude'         => $property['longitude'],
                'image_full'        => $property['image_full'],
                'image_thumbnail'   => $property['image_thumbnail'],
                'num_bedrooms'      => $property['num_bedrooms'],
                'num_bathrooms'     => $property['num_bathrooms'],
                'price'             => $property['price'],
                'for'               => $property['type'],
                'property_type_id'  => $property['property_type_id'],
                'created_at'        => $property['created_at'],
                'updated_at'        => $property['updated_at'],
            ]);

        }
    }
}