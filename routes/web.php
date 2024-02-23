<?php

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
    Route::view('login', 'auth.login')->name('login');
    Route::view('register', 'auth.register')->name('register');
});


Route::prefix('admin')->name('admin.')->group(function () {
    Route::view('home', 'admin.home')->name('home');
    //vehicles
    Route::get('vehicles', [VehicleController::class, 'index'])->name('vehicles');
    Route::get('vehicles/create', [VehicleController::class, 'create'])->name('create-vehicle');
    Route::post('vehicles/create', [VehicleController::class, 'store'])->name('create-vehicle-treatment');
    // 
    Route::view('drivers', 'admin.drivers')->name('drivers');
    Route::view('statistics', 'admin.statistics')->name('statistics');
    Route::view('rental', 'admin.rental')->name('rental');
    Route::view('assistance', 'admin.assistance')->name('assistance');
    Route::view('settings', 'admin.settings')->name('settings');
    Route::view('logout', 'admin.logout')->name('logout');
});
