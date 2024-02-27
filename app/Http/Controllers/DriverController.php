<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use Illuminate\Http\Request;

class DriverController extends Controller
{
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
            'license_number' => 'required',
            'phonenumber' => 'required',
            'license_category' => 'required',
            'license_emission_date' => 'required',
            'license_expiration_date' => 'required',
            'avatar' => 'nullable',

        ]);

        Driver::create([
            'fullname' => $request->fullname,
            'years_of_xp' => $request->years_of_xp,
            'license_number' => $request->license_number,
            'phonenumber' => $request->phonenumber,
            'license_category' => $request->license_category,
            'license_emission_date' => $request->license_emission_date,
            'license_expiration_date' => $request->license_expiration_date,
            'avatar' => $request->avatar
        ]);

        return redirect('admin/drivers/create')->with('status', 'Chauffeur ajouté avec succès');
    }
}
