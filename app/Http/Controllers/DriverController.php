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
}
