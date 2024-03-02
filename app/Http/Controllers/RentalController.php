<?php

namespace App\Http\Controllers;

use App\Models\Rental;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class RentalController extends Controller
{
    //

    function index()
    {
        $rentals = Rental::all();
        return view('admin.rentals.index', compact('rentals'));
    }

    function create()
    {
        $vehicles = Vehicle::all();
        return view('admin.rentals.create', compact('vehicles'));
    }

    function store(Request $request)
    {

        $request->validate([
            'vehicle_id' => 'required',
            'client_fullname' => 'required',
            'client_phonenumber' => 'required',
            'starting_point' => 'required',
            'ending_point' => 'required',
            'starting_date' => 'required',
            'ending_date' => 'required',
        ]);

        $vehicle = Vehicle::find($request->vehicle_id);

        if ($vehicle) {
            $vehicle->update([
                'status' => 'unavailable'
            ]);
            Rental::create($request->all());
        }


        return redirect('admin/rentals/create')->with('status', 'Location créée avec succès');
    }

    function update_form($id)
    {
        $rental = Rental::find($id);
        $vehicles = Vehicle::all();

        return view('admin.rentals.update', compact('rental', 'vehicles'));
    }
}
