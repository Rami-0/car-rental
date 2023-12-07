<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;

class CarController extends Controller
{
    public function index()
    {
        return view('cars.index', [
            'cars' => Car::all()
        ]);
    }

    public function create()
    {
        return view('cars.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'brand' => 'required',
            'model' => 'required',
            'year' => 'required|integer',
            'price' => 'required|numeric',
            'color' => 'required',
            'license_plate' => 'required',
        ]);

        Car::create([
            'brand' => $request->brand,
            'model' => $request->model,
            'year' => $request->year,
            'price' => $request->price,
            'color' => $request->color,
            'license_plate' => $request->license_plate,
            'status' => 'Available',
        ]);

        return redirect()->route('cars.index')->with('success', 'Car added successfully.');

        // Store a newly created car in the database
    }

    public function show(Car $car)
    {
        return view('cars.show', compact('car'));
    }

    public function edit(Car $car)
    {
        return view('cars.edit', compact('car'));
    }

    public function update(Request $request, Car $car)
    {
        // Update the specified car in the database
        $rules = [
            'brand' => 'required',
            'model' => 'required',
            'year' => 'required|integer',
            'price' => 'required|numeric',
            'color' => 'required',
            'license_plate' => 'required',
        ];

        $request->validate($rules);

        $car->update($request->all());
        // You can return a response or redirect to another route here
        return redirect()->route('cars.index')->with('success', 'Car updated successfully');
    }

    public function destroy(Car $car)
    {
        $car->delete();
        return redirect()->route('cars.index')->with('success', 'Car deleted successfully.');

        // Remove the specified car from the database
    }


}
