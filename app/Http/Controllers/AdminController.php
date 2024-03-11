<?php

namespace App\Http\Controllers;

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

        return view('admin.home', compact('rentals', 'drivers', 'vehicles', 'clients'));
    }
    function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('auth.admin-login');
    }
}
