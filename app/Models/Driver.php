<?php

namespace App\Models;

use App\Models\Vehicle;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends User
{
    use HasFactory;

    protected $table = 'drivers';

    protected $fillable = [
        'fullname',
        'years_of_xp',
        'license_number',
        'phonenumber',
        'license_category',
        'license_emission_date',
        'license_expiration_date',
        'avatar',
        'password',

    ];

    protected $casts = [
        'photos' => 'array'
    ];


    public function vehicle()
    {
        return $this->hasOne(Vehicle::class);
    }
}
