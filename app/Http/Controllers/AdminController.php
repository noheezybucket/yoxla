<?php

namespace App\Http\Controllers;

use App\Charts\StatsChart;
use App\Models\Admin;
use App\Models\Client;
use App\Models\Driver;
use App\Models\Rental;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    function admin_login_form()
    {
        // Admin::create([
        //     'email' => 'seydinag023@gmail.com',
        //     'fullname' => 'Mouhamad Gueye',
        //     'password' => Hash::make('passer')
        // ]);
        return view('auth.admin-login');
    }

    function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('admin.home');
        } else {
            Session::flash('error-message', 'Email ou mot de passe invalide');
            return back();
        }
    }

    function dashboard()
    {
        $rentals = Rental::all();
        $drivers = Driver::all();
        $vehicles = Vehicle::all();
        $clients = Client::all();

        $driver = Driver::pluck('salary', 'created_at');
        $chart = new StatsChart;
        $chart->labels($driver->keys());
        $chart->dataset('Evolution des salaires', 'bar', $driver->values())->backgroundColor("#3A80F4");

        $rental = Rental::pluck('price', 'created_at');
        $chart2 = new StatsChart;
        $chart2->labels($rental->keys());
        $chart2->dataset('Locations journalières', 'line', $rental->values())->backgroundColor('#F4723A');

        return view('admin.home', compact('rentals', 'drivers', 'vehicles', 'clients', 'chart', 'chart2'));
    }
    function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('auth.admin-login');
    }

    function stats()
    {
        $driver = Driver::pluck('salary', 'created_at');
        $chart = new StatsChart;
        $chart->labels($driver->keys());
        $chart->dataset('Evolution des salaires', 'bar', $driver->values())->backgroundColor("#3A80F4");

        $rental = Rental::pluck('price', 'created_at');
        $chart2 = new StatsChart;
        $chart2->labels($rental->keys());
        $chart2->dataset('Locations journalières', 'doughnut', $rental->values())->backgroundColor(['#F4723A', '#3A80F4', '#11B990', '#ECECEC']);

        return view('admin.statistics', compact('chart', 'chart2'));
    }
}
