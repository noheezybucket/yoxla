<?php

namespace App\Models;

use App\Models\Vehicle;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    use HasFactory;

    protected $table = 'drivers';

    protected $guarded = [];

    protected $casts = [
        'photos' => 'array'
    ];


    public function vehicle()
    {
        return $this->hasOne(Vehicle::class);
    }
}
