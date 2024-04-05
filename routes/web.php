<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TripsController;
use App\Http\Controllers\DriversController;
use App\Http\Controllers\VehicleController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Vehicles
Route::resource('vehicles', VehicleController::class);

//Drivers
Route::resource('drivers', DriversController::class);

//Trips
Route::get('trips', [TripsController::class,'index'])->name('trips.index');
Route::get('trips/create', [TripsController::class,'create'])->name('trips.create');
Route::post('trips/selectVehicle',[TripsController::class,'selectVehicle'])->name('trips.selectVehicle');
Route::post('trips/selectDriver',[TripsController::class,'selectDriver'])->name('trips.selectDriver');
Route::post('trips/store',[TripsController::class,'store'])->name('trips.store');