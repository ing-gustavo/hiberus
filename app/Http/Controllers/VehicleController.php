<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    function index()
    {
        return view('vehicles.index',['vehicles' => Vehicle::all()]);
    }

    function create()
    {
        return view('vehicles.create');
    }

    function store(Request $request)
    {
        $validated = $request->validate([
            'brand'             => 'required',
            'model'             => 'required',
            'plate'             => 'required',
            'licenseRequired'   => 'required|string|max:1',
        ]);

        Vehicle::create($validated);

        return redirect()->route('vehicles.index')->with('success','Vehicle has been created successfully.');
    }

    function edit(Vehicle $vehicle)
    {
        return view('vehicles.edit')->with("vehicle",$vehicle);
    }

    function update(Vehicle $vehicle,Request $request)
    {
        $validated = $request->validate([
            'brand'             => 'required',
            'model'             => 'required',
            'plate'             => 'required',
            'licenseRequired'   => 'required|string|max:1',
        ]);

        if ($vehicle->hasTrips())
        {
            return redirect()->route('vehicles.index')->with('error','The vehicle cannot be edited as there are scheduled trips assigned to them.');
        } 

        $vehicle->update($validated);
        return redirect()->route('vehicles.index')->with('success','Vehicle was successfully edited.');
    }

    function destroy(Vehicle $vehicle)
    {
        if ($vehicle->hasTrips())
        {
            return redirect()->route('vehicles.index')->with('error','The vehicle cannot be deleted as there are scheduled trips assigned to them.');
        } 
     
        $vehicle->delete();
        return redirect()->route('vehicles.index')->with('success','Vehicle was successfully deleted.');

    }
}
