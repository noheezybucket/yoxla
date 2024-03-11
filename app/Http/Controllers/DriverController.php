<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use App\Models\Rental;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class DriverController extends Controller
{
    function dashboard()
    {
        $user = auth()->guard('driver')->user();

        $driver = Driver::find($user->id);

        $rentals = [];

        if ($driver->vehicle !== null) {

            $rentals = Rental::where('vehicle_id', $driver->vehicle->id)->get();
        }

        return view('driver.home', compact('rentals'));
    }

    function index()
    {
        $drivers = Driver::all();

        return view('admin.drivers.index', ['drivers' => $drivers]);
    }

    function create()
    {
        return view('admin.drivers.create');
    }

    function store(Request $request)
    {
        $request->validate([
            'fullname' => 'required',
            'years_of_xp' => 'required',
            'license_number' => 'required|unique:drivers,license_number',
            'phonenumber' => 'required',
            'license_category' => 'required',
            'license_emission_date' => 'required',
            'license_expiration_date' => 'required',
            'avatar' => 'nullable',
            'password' => 'required'
        ]);

        Driver::create([
            'fullname' => $request->fullname,
            'years_of_xp' => $request->years_of_xp,
            'license_number' => $request->license_number,
            'phonenumber' => $request->phonenumber,
            'license_category' => $request->license_category,
            'license_emission_date' => $request->license_emission_date,
            'license_expiration_date' => $request->license_expiration_date,
            'avatar' => $request->avatar,
            'password' => Hash::make($request->password)
        ]);

        return redirect('admin/drivers/create')->with('status', 'Chauffeur ajouté avec succès');
    }

    function show($id)
    {
        $driver = Driver::find($id);
        return view("admin.drivers.show", compact('driver'));
    }

    function update_form($id)
    {
        $driver = Driver::find($id);
        return view("admin.drivers.update", ['id' => $id], compact('driver'));
    }

    function update(Request $request, $id)
    {
        $request->validate([
            'fullname' => 'required',
            'years_of_xp' => 'required',
            'license_number' => 'required',
            'phonenumber' => 'required',
            'license_category' => 'required',
            'license_emission_date' => 'required',
            'license_expiration_date' => 'required',
            'avatar' => 'nullable',

        ]);

        $driver = Driver::find($id);
        $driver->update($request->all());


        return redirect('admin/drivers/update/' . $id)->with('status', 'Chauffeur modifié avec succès');
    }

    function delete($id)
    {

        return view('admin.drivers.delete', compact('id'));
    }

    function destroy($id)
    {
        $driver = Driver::find($id);
        $driver->delete();

        return redirect('admin/drivers')->with('status', 'Chauffeur supprimé avec succès');
    }

    function driver_login_form()
    {
        return view('auth.driver-login');
    }

    function login(Request $request)
    {
        $request->validate([
            'phonenumber' => 'required',
            'password' => 'required',
        ]);

        if (Auth::guard('driver')->attempt(['phonenumber' => $request->phonenumber, 'password' => $request->password])) {
            return redirect()->route('driver.home');
        } else {
            Session::flash('error-message', 'Email ou mot de passe invalide');
            return back();
        }
    }

    function logout()
    {
        Auth::guard('driver')->logout();
        return redirect()->route('auth.driver-login');
    }
}
