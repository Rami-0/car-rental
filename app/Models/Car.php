<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $fillable = [
        'make',
        'model',
        'year',
        'license_plate',
        'price_per_day',
        'color',         // New field for car color
        'photo',         // New field for car photo path
    ];

    // ... other model methods and relationships

}
