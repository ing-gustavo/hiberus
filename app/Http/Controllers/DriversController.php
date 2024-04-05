<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use Illuminate\Http\Request;

class DriversController extends Controller
{
    function index()
    {
        return view('drivers.index',['drivers' => Driver::all()]);
    }

    function create()
    {
        return view('drivers.create');
    }

    function store(Request $request)
    {
        $validated = $request->validate([
            'name'      => 'required|string',
            'surname'   => 'required|string',
            'license'   => 'required|string|max:1',
        ]);

        Driver::create($validated);
        return redirect()->route('drivers.index')->with('success','Driver has been created successfully.');
    }

    function edit(Driver $driver)
    {
        return view('drivers.edit')->with("driver",$driver);
    }

    function update(Driver $driver,Request $request)
    {
        $validated = $request->validate([
            'name'      => 'required|string',
            'surname'   => 'required|string',
            'license'   => 'required|string|max:1',
        ]);

        if ($driver->hasTrips())
        {
            return redirect()->route('drivers.index')->with('error','The driver cannot be edited as there are scheduled trips assigned to them.');
        } 
     
        $driver->update($validated);
        return redirect()->route('drivers.index')->with('success','Driver was successfully edited.');
    }

    function destroy(Driver $driver)
    {
        if ($driver->hasTrips())
        {
            return redirect()->route('drivers.index')->with('error','The driver cannot be deleted as there are scheduled trips assigned to them.');
        } 
     
        $driver->delete();
        return redirect()->route('drivers.index')->with('success','Driver was successfully deleted.');
    }
}
