<?php

namespace App\Http\Controllers;

use App\Models\Trip;
use App\Models\Vehicle;
use App\Models\Driver;
use Illuminate\Http\Request;

class TripsController extends Controller
{
    function index()
    {
        $trips = Trip::with('driver','vehicle')->whereNotNull('vehicle_id')->whereNotNull('driver_id')->get();
        return view('trips.index',['trips' => $trips ]);
    }

    function create(Request $request)
    {
        return view('trips.create');
    }

    function store(Request $request)
    {
        $request->validate([
            'date'      => 'required|date',
        ]);

        return redirect()->route('trips.selectVehicle', ['date' => $request->date]);
    }

    function selectVehicle(Request $request){
        
        $request->validate([
            'date'      => 'required|date',
        ]);

        $vehicles  = Vehicle::whereDoesntHave('trips', function ($query) use($request) {
                        $query->where('date', $request->date);
                    })->get();


        return view('trips.select_vehicle',['vehicles' => $vehicles,'date' => $request->date]);
    }

    function storeVehicle(Request $request)
    {
        $request->validate([
            'vehicle_id'    => 'required|numeric',
            'date'          => 'required|date',
        ]);

        return redirect()->route('trips.selectDriver', ['date' => $request->date,'vehicle_id' => $request->vehicle_id]);
    }

    function selectDriver(Request $request)
    {
        $validated = $request->validate([
            'vehicle_id'    => 'required|numeric',
            'date'          => 'required|date',
        ]);

        $vehicle            =   Vehicle::findOrFail($request->vehicle_id);
        $license            =   $vehicle->licenseRequired;
        $date               =   $request->date;

        $availableDrivers   = Driver::whereDoesntHave('trips', function ($query) use ($date) {
                                            $query->where('date', $date);
                                        })
                                        ->where('license',$license )
                                        ->get();

        return view('trips.select_driver',['date' => $request->date,'vehicle_id' => $request->vehicle_id,'availableDrivers' => $availableDrivers]);
    }

    function storeDriver(Request $request)
    {
        $validated = $request->validate([
            'vehicle_id'    => 'required|numeric',
            'driver_id'     => 'required|numeric',
            'date'          => 'required|date',
        ]);
        
        Trip::create($validated);

        return redirect()->route('trips.index')->with('success','Trip has been created successfully.');;

    }

}
