<?php

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
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::view('home', 'admin.home')->name('home');
    Route::view('vehicles', 'admin.vehicles')->name('vehicles');
    Route::view('drivers', 'admin.drivers')->name('drivers');
    Route::view('statistics', 'admin.statistics')->name('statistics');
    Route::view('rental', 'admin.rental')->name('rental');
    Route::view('assistance', 'admin.assistance')->name('assistance');
    Route::view('settings', 'admin.settings')->name('settings');
    Route::view('logout', 'admin.logout')->name('logout');
});
