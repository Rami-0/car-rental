<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index()
    {
        // Retrieve a list of reservations and pass them to a view
        $reservations = Reservation::all();
        return view('reservations.index', compact('reservations'));
    }

    public function show(Reservation $reservation)
    {
        return view('reservations.show', compact('reservation'));
    }



    public function create()
    {
        // Check the user's role
//        if (auth()->user()->is_admin) {
        // Logic for admin reservation form
        // You can show a different form or redirect to an admin-specific reservation page
//            return view('reservations.admin_create');
//        } else {
        // Logic for regular user reservation form
//        return view('reservations.create');
//        }

        $users = User::all();
        $cars = Car::all(); //where('status', 'Available')->get(); // Assuming you have a 'status' column in the Car model to track availability.
        return view('reservations.create', compact('users', 'cars'));
    }

    public function createForCar(Car $car)
    {
        // Logic for regular user reservation form with specific car
        return view('reservations.create', compact('car'));
    }


    public function store(Request $request)
    {
        // Validate the reservation data
        $request->validate([
            'user_id' => 'required|exists:users,id', // Check if the selected user exists
            'car_id' => 'required|exists:cars,id',   // Check if the selected car exists
            'pickup_date' => 'required|date',
            // You can add additional validation rules here for other fields
        ]);

        // Assuming 'return_date' and other reservation details are submitted in the form, you can include them in the validation rules.

        // Create a new reservation
        Reservation::create([
            'user_id' => $request->user_id,
            'car_id' => $request->car_id,
            'pickup_date' => $request->pickup_date,
            'status' => 'Pending', // Assuming the default status is 'Pending'
            // Include other reservation details here
        ]);

        // You can add a success message to be displayed to the user
        return redirect()->route('reservations.index')->with('success', 'Reservation created successfully.');
    }

    public function changeStatus(Reservation $reservation)
    {
        // Change the status of a reservation (e.g., from "Available" to "Reserved")
    }
}

