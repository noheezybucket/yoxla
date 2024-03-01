<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    function index()
    {
        $vehicles = Vehicle::all();

        return view('admin.vehicles.index', compact('vehicles'));
    }

    function create()
    {
        return view('admin.vehicles.create');
    }

    function store(Request $request)
    {
        $request->validate([
            'brand' => 'required',
            'model' => 'required',
            'color' => 'required',
            'seats' => 'required',
            'purchase_date' => 'required',
            'mileage' => 'required',
            'registration' => 'required',
            'type' => 'required',
            'gearbox' => 'required',
            'daily_price' => 'required',
            'hourly_price' => 'required',
            'photos' => 'required'
        ]);

        Vehicle::create([
            'brand' => $request->brand,
            'model' => $request->model,
            'color' => $request->color,
            'seats' => $request->seats,
            'purchase_date' => $request->purchase_date,
            'origin_mileage' => $request->mileage,
            'registration' => $request->registration,
            'type' => $request->type,
            'gearbox' => $request->gearbox,
            'daily_price' => $request->daily_price,
            'hourly_price' => $request->hourly_price,
            'photos' => $request->photos
        ]);

        return redirect('admin/vehicles/create')->with('status', 'Véhicule ajouté avec succès');
    }

    function show($id)
    {
        $vehicle = Vehicle::find($id);
        return view("admin.vehicles.show", compact("vehicle"));
    }

    function update_form($id)
    {
        $vehicle = Vehicle::find($id);
        return view('admin.vehicles.update', compact('vehicle'));
    }

    function update(Request $request, $id)
    {
        $vehicle = Vehicle::find($id);

        $request->validate([
            'brand' => 'required',
            'model' => 'required',
            'color' => 'required',
            'seats' => 'required',
            'purchase_date' => 'required',
            'origin_mileage' => 'required',
            'registration' => 'required',
            'type' => 'required',
            'gearbox' => 'required',
            'daily_price' => 'required',
            'hourly_price' => 'required',
            'photos' => 'required'
        ]);

        $vehicle->update($request->all());

        return redirect('admin/vehicles/update/' . $id)->with('status', 'Les informations du véhicule ont été modifiés avec succès');
    }

    function delete($id)
    {

        return view('admin.vehicles.delete', compact('id'));
    }

    function destroy($id)
    {
        $vehicle = Vehicle::find($id);

        $vehicle->delete();

        return redirect('admin/vehicles')->with('status', 'Véhicule supprimé avec succès');
    }
}
