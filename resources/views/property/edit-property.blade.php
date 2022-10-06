@extends('layouts.main')


@section('custom_css')
@endsection

@section('content')
<!-- ============ Body content start ============= -->
<div class="main-content-wrap sidenav-open d-flex flex-column">
    <div class="breadcrumb">
        <h1 class="mr-2">Edit Property</h1>
    </div>
    <div class="separator-breadcrumb border-top"></div>

    <div class="row">
        <div class="col col-lg-12 d-flex justify-content-center">
            <section class="card col col-lg-12">
                <div class="card-body">
                    <h2 class="card-title">
                        Edit Property
                    </h2>
                    @include('layouts.alerts')
                    <div class="card-body">
                        <form action="{{ route('property.update',[$property->uuid]) }}" class="form-horizontal form-bordered needs-validation" method="post" novalidate="novalidate">
                            @csrf
                            <div class="row">
                                <div class="col-lg">
                                    <div class="form-group row mb-3">
                                        <div class="col-lg-6">
                                            <div class="form-control-wrapper mb-3">
                                                <label for="county">County</label>
                                                <input type="text" class="form-control" name="county" value ="{{$property->county}}" id="County" required>

                                            </div>
                                            <div class="form-control-wrapper mb-3">
                                                <label for="country">Country</label>
                                                <input type="text" class="form-control" name="country" value="{{ $property->country }}" id="country"required>

                                            </div>
                                            <div class="form-control-wrapper mb-3">
                                                <label for="town">Town</label>
                                                <input type="text" class="form-control" name="town" value ="{{$property->town}}" id="town" required>
                                            </div>
                                            <div class="form-control-wrapper mb-3">
                                                <label for="postcode">PostCode</label>
                                                <input type="text" class="form-control" name="postcode" value="{{$property->postcode}}" id="postcode"required>

                                            </div>
                                            <div class="form-control-wrapper mb-3">
                                                <label >Property Type</label>
                                                <select class="form-control" name="property_type_id" required>
                                                    <option value=""  disabled>Select Property Type</option>
                                                    @if($property_types->count() > 0)
                                                    @foreach($property_types as $type)
                                                        <option value="{{ $type->id }}" @if ($type->id == $property->product_type_id)
                                                            selected
                                                        @endif>{{ $type->title }}</option>
                                                    @endforeach
                                                    @endif
                                                </select>
                                                
                                            </div>
                                             <div class="form-control-wrapper mb-3">
                                                <label for="description">Price</label>
                                                <input type="text" class="form-control" name="price" value ="{{$property->price}}" id="price" required>

                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            
                                            

                                            <div class="form-control-wrapper mb-3">
                                                <label for="description">Description</label>
                                                <input type="text" placeholder="Description of Property" class="form-control" name="description" value="{{$property->description}}" required>

                                            </div>

                                            <div class="form-control-wrapper mb-3">
                                                <label>For</label>
                                                <input type='radio' name='for' id='main' @if ($property->for == 'rent') checked @endif value='rent'/>
                                                <label for="main">Rent</label>
                                                <input type='radio' name='for' id='main' @if ($property->for == 'sale') checked @endif value='sale'/>
                                                <label for="main">Sale</label>

                                            </div>

                                        
                                            <div class="form-control-wrapper mb-3">
                                                <label for="postcode">Number of Bedrooms</label>
                                                <select class="form-control" name="num_bedrooms" required>
                                                    <option value=""  disabled>Select</option>
                                                    
                                                    @foreach(range(1,10) as $type)
                                                        <option value="{{ $type }}" @if ($property->num_bedrooms == $type)
                                                            selected
                                                        @endif>{{ $type }}</option>
                                                    @endforeach
                                                    
                                                </select>

                                            </div>
                                            <div class="form-control-wrapper mb-3">
                                                <label >Number of Bathrooms</label>
                                               <select class="form-control" name="num_bathrooms" required>
                                                    <option value="" disabled>Select</option>
                                                    
                                                    @foreach(range(1,10) as $type)
                                                        <option value="{{ $type }}" @if ($property->num_bathrooms == $type)
                                                            selected
                                                        @endif>{{ $type }}</option>
                                                    @endforeach
                                                    
                                                </select>
                                                
                                            </div>

                                            <div class="form-control-wrapper mb-3">
                                                <label for="description">Displayable Address</label>
                                                <textarea class="form-control" name="address" id='address'>{{$property->address}}</textarea>
                                            </div>

                                           
                                        </div>
                                    </div>

                                    <div class="form-group row mt-4">
                                        <div class="col-lg-12">
                                            <button type="submit"  class="btn btn-lg btn-primary ladda-button basic-ladda-button float-right" data-style="expand-left">
                                                Update Property
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
            </section>
        </div>
    </div>
</div>
<!-- end: page -->

@endsection
@section('scripts')
@parent

<script>

</script>
@endsection
