<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class PropertyType extends Model{

    protected $fillable = [
        'id',
        'title',
        'description',
        'created_at',
        'updated_at',
    ];
    
}
