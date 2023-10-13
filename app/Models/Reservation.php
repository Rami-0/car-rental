<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = [
        'user_id',        // User who made the reservation
        'car_id',         // Car being reserved
        'pickup_date',    // Date and time of car pickup
        'return_date',    // Date and time of car return
        // Additional fields for reservation details
    ];

    // Define the user-car relationship
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function car()
    {
        return $this->belongsTo(Car::class);
    }

    // ... other model methods

}
