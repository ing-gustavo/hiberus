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
        return view('trips.index',['trips' => Trip::with('driver','vehicle')->orderBy('id','desc')->get() ]);
    }

    function create(Request $request)
    {
        return view('trips.create');
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

    function store(Request $request)
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
