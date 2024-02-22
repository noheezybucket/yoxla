<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VehicleController extends Controller
{
    function index()
    {
        return view('admin.vehicles.index');
    }

    function create()
    {
        return view('admin.vehicles.create');
    }
}
