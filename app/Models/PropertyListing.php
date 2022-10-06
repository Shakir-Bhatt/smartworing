<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PropertyListing extends Model
{
    protected $fillable = [
        'uuid',            
        'county',          
        'country',         
        'town',            
        'description',     
        'address',         
        'latitude',        
        'longitude',       
        'image_full',      
        'image_thumbnail', 
        'num_bedrooms',    
        'num_bathrooms',   
        'price',           
        'for',            
        'property_type_id',
        'created_at',      
        'updated_at',      
    ];
}
