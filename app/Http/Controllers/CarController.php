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
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Get the uploaded file
        $photoFile = $request->file('photo');

        // Generate a unique name for the file
        $photoFileName = time() . '_' . $photoFile->getClientOriginalName();

        // Store the file in the 'public/cars' directory
        $photoPath = $photoFile->storeAs('cars', $photoFileName, 'public');

        // Create a new Car instance and save it to the database
        Car::create([
            'brand' => $request->brand,
            'model' => $request->model,
            'year' => $request->year,
            'price' => $request->price,
            'color' => $request->color,
            'license_plate' => $request->license_plate,
            'status' => 'Available',
            'photo' => $photoPath,
        ]);

        return redirect()->route('cars.index')->with('success', 'Car added successfully.');
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
