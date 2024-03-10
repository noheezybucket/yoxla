<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\RentalController;
use App\Http\Controllers\VehicleController;
use Illuminate\Support\Facades\Route;

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

Route::prefix('auth')->name('auth.')->group(function () {
    // admin auth
    Route::get('admin_login', [AdminController::class, 'admin_login_form'])->name('admin-login');
    Route::post('admin_login', [AdminController::class, 'login'])->name('do-admin-login');

    // driver auth
    Route::get('driver_login', [DriverController::class, 'driver_login_form'])->name('driver-login');
    Route::post('driver_login', [DriverController::class, 'login'])->name('do-driver-login');

    // client


    Route::view('register', 'auth.register')->name('register');
});


Route::middleware('admin')->prefix('admin')->name('admin.')->group(function () {
    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('home');
    //vehicles
    Route::get('vehicles', [VehicleController::class, 'index'])->name('vehicles');
    Route::get('vehicles/create', [VehicleController::class, 'create'])->name('create-vehicle');
    Route::post('vehicles/create', [VehicleController::class, 'store'])->name('create-vehicle-treatment');
    Route::get('vehicles/show/{id}', [VehicleController::class, 'show'])->name('show-vehicle');
    Route::get('vehicles/update/{id}', [VehicleController::class, 'update_form'])->name('update-vehicle');
    Route::put('vehicles/update/{id}', [VehicleController::class, 'update'])->name('update-vehicle-treatment');
    Route::get('vehicles/delete/{id}', [VehicleController::class, 'delete'])->name('delete-vehicle');
    Route::delete('vehicles/delete/{id}', [VehicleController::class, 'destroy'])->name('delete-vehicle-treatment');

    // drivers
    Route::get('drivers', [DriverController::class, 'index'])->name('drivers');
    Route::get('drivers/create', [DriverController::class, 'create'])->name('create-driver');
    Route::post('drivers/create', [DriverController::class, 'store'])->name('create-driver-treatment');
    Route::get('drivers/show/{id}', [DriverController::class, 'show'])->name('show-driver');
    Route::get('drivers/update/{id}', [DriverController::class, 'update_form'])->name('update-driver');
    Route::put('drivers/update/{id}', [DriverController::class, 'update'])->name('update-driver-treatment');
    Route::get('drivers/delete/{id}', [DriverController::class, 'delete'])->name('delete-driver');
    Route::delete('drivers/delete/{id}', [DriverController::class, 'destroy'])->name('delete-driver-treatment');

    //rentals
    Route::get('rentals', [RentalController::class, 'index'])->name('rentals');
    Route::get('rentals/create', [RentalController::class, 'create'])->name('create-rental');
    Route::post('rentals/create', [RentalController::class, 'store'])->name('create-rental-treatment');
    Route::get('rentals/show/{id}', [RentalController::class, 'show'])->name('show-rental');
    Route::get('rentals/update/{id}', [RentalController::class, 'update_form'])->name('update-rental');
    Route::put('rentals/update/{id}', [RentalController::class, 'update'])->name('update-rental-treatment');
    Route::get('rentals/delete/{id}', [RentalController::class, 'delete'])->name('delete-rental');
    Route::delete('rentals/delete/{id}', [RentalController::class, 'destroy'])->name('delete-rental-treatment');

    Route::view('statistics', 'admin.statistics')->name('statistics');
    Route::view('assistance', 'admin.assistance')->name('assistance');
    Route::view('settings', 'admin.settings')->name('settings');
    //logout
    Route::get('logout', [AdminController::class, 'logout'])->name('logout');
});

Route::middleware('driver')->prefix('driver')->name('driver.')->group(function () {
    Route::get('dashboard', [DriverController::class, 'dashboard'])->name('home');
});
