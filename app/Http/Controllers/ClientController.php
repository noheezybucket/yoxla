<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Driver;
use App\Models\Rental;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class ClientController extends Controller
{
    //

    function dashboard()
    {
        $user = auth()->guard('client')->user();

        $client = Client::find($user->id);

        $rentals = [];

        if ($client) {

            $rentals = Rental::where('client_fullname', $client->fullname)->get();
        }

        return view('client.home', compact('rentals'));
    }

    function create_rental()
    {
        return view('client.create-rental');
    }

    function client_login_form()
    {
        return view('auth.client-login');
    }

    function register(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'phonenumber' => 'required',
            'fullname' => 'required',
            'password' => 'required',
        ]);

        Client::create([
            'email' => $request->email,
            'fullname' => $request->fullname,
            'phonenumber' => $request->phonenumber,
            'password' => Hash::make($request->password)
        ]);

        return view('auth.client-login');
    }

    function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if (Auth::guard('client')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('client.home');
        } else {
            Session::flash('error-message', 'Email ou mot de passe invalide');
            return back();
        }
    }

    function logout()
    {
        Auth::guard('client')->logout();
        return redirect()->route('auth.client-login');
    }

    function rate_driver_treatment(Request $request, $id)
    {
        $request->validate([
            'rate' => 'required',
        ]);

        $rental = Rental::find($id);
        $driver = Driver::find($rental->vehicle->driver_id);
        // $rate = (int)$request->rate;

        $driver->update([
            'avg_rating' => $request->rate
        ]);

        return redirect()->route('client.home')->with('status', 'Chauffeur noté avec succès');
    }
}
