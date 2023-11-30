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
        'status',        // New field for car status
        'color',         // New field for car color
        'photo',         // New field for car photo path
    ];

    // ... other model methods and relationships

    /**
     * Change the status of a car.
     *
     * @param int $carId
     * @param string $newStatus
     * @return bool
     */
    public static function changeStatus($carId, $newStatus)
    {
        // Find the car by ID
        $car = self::find($carId);

        // Update the status if the car is found
        if ($car) {
            $car->update(['status' => $newStatus]);
            return true; // Status changed successfully
        }

        return false; // Car not found
    }

}
