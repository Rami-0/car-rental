<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index()
    {
        // Retrieve a list of reservations and pass them to a view
        $reservations = Reservation::all();
        return view('reservations.index', compact('reservations'));
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
        return view('reservations.create');
//        }
    }

    public function createForCar(Car $car)
    {
        // Logic for regular user reservation form with specific car
        return view('reservations.create', compact('car'));
    }


    public function store(Request $request)
    {
        // Handle the creation of a new reservation
        // Validate and store the reservation data in the database
    }

    public function changeStatus(Reservation $reservation)
    {
        // Change the status of a reservation (e.g., from "Available" to "Reserved")
    }
}

