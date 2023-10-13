<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $fillable = [
        'brand',
        'model',
        'year',
        'license_plate',
        'price',
        'color',         // New field for car color
        'photo',         // New field for car photo path
    ];

    // ... other model methods and relationships

}
