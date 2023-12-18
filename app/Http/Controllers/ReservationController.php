<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Reservation;
use App\Models\User;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Vaidator;


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
        $users = User::all();
        $cars = Car::where('status', '=', 'Available')->get(); // Assuming you have a 'status' column in the Car model to track availability.
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
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id',
            'car_id' => 'required|exists:cars,id',
            'pickup_date' => 'required|date',
            'return_date' => 'required|date|after:pickup_date',
            // Add any additional validation rules for other fields here
        ]);

        // Check if the validation fails
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Reservation could not be created. Please enter a valid data.');
        }

        // Create a new reservation
        $reservation = Reservation::create([
            'user_id' => $request->user_id,
            'car_id' => $request->car_id,
            'pickup_date' => $request->pickup_date,
            'return_date' => $request->return_date,
            'status' => 'Pending', // Assuming the default status is 'Pending'
            // Include other reservation details here
        ]);

        Car::changeStatus($request->car_id, 'Reserved');

        // Redirect the user to the reservation details page with the reservation ID
        return redirect()->route('reservations.show', $reservation->id)->with('success', 'Reservation created successfully.');
    }

    public function changeStatus(Reservation $reservation)
    {
        // Change the status of a reservation (e.g., from "Available" to "Reserved")
        $reservation->update(['status' => 'Reserved']);
    }

    public function reserveCar(Car $car)
    {
        // You can pass additional data to the reservation form if needed
        return view('reservations.reserveCar', compact('car'));
    }

    public function destroy(Reservation $reservation)
    {
        // Delete the reservation
        Car::changeStatus($reservation->car_id, 'Available');
        $reservation->delete();
        return redirect()->route('reservations.index')->with('success', 'Reservation deleted successfully.');
    }

    public function approve(Reservation $reservation)
    {
        // Approve the reservation
        $reservation->update(['status' => 'Approved']);
        return redirect()->route('reservations.index')->with('success', 'Reservation approved successfully.');
    }

    /**
     * @throws \Exception
     */
    public function checkout($reservationId)
    {
        $reservation = Reservation::where('id', '=', $reservationId)->first();

        if (!$reservation) {
            // Handle the case where the reservation is not found
            abort(404);
        }

        $car = Car::where('id', '=', $reservation->car_id)->first();

        if (!$car) {
            // Handle the case where the car is not found
            abort(404);
        }

        $pickupDate = new DateTime($reservation->pickup_date);
        $returnDate = new DateTime($reservation->return_date);
        $daysDifference = $returnDate->diff($pickupDate)->days;

        $amount = $car->price * $daysDifference;

        $amount = number_format($amount, 2, '.', '');

        return view("reservations.checkout", compact('reservation', 'car', 'amount'));
    }


    public function myReservations()
    {
        $currentUser = auth()->user();
        $reservations = Reservation::where('user_id', $currentUser->id)->get();

        return view('dashboard', compact('reservations'));
    }

}

