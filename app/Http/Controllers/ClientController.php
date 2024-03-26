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

        return view('client.home', compact('rentals', 'user'));
    }

    function create_rental()
    {
        $vehicles = Vehicle::all();

        return view('client.create-rental', compact('vehicles'));
    }


    function create_rental_treatment(Request $request)
    {
        $request->validate([
            'vehicle_id' => 'required',
            'client_fullname' => 'required',
            'client_phonenumber' => 'required',
            'client_email' => 'required|email',
            'client_password' => 'required',
            'starting_point' => 'required',
            'ending_point' => 'required',
            'starting_date' => 'required|date|after_or_equal:today',
            'ending_date' => 'required|date|after:starting_date',
        ]);

        $vehicle = Vehicle::find($request->vehicle_id);
        $client = Client::where('email', $request->client_email)->first();

        if ($client === null) {
            Client::create([
                'fullname' => $request->client_fullname,
                'phonenumber' => $request->client_phonenumber,
                'email' => $request->client_email,
                'password' => Hash::make($request->client_password),
            ]);
        }

        if ($vehicle) {
            $vehicle->update([
                'status' => 'unavailable'
            ]);

            Rental::create([
                'vehicle_id' => $request->vehicle_id,
                'client_fullname' => $request->client_fullname,
                'client_phonenumber' => $request->client_phonenumber,
                'starting_point' => $request->starting_point,
                'ending_point' => $request->ending_point,
                'starting_date' => $request->starting_date,
                'ending_date' => $request->ending_date,
            ]);
        }



        return redirect('client/create-rental')->with('status', 'Location créée avec succès');
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
