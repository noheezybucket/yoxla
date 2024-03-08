<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Driver;
use App\Models\Rental;

class Vehicle extends Model
{
    use HasFactory;
    protected $table = 'vehicles';

    protected $guarded = [];

    protected $casts = [
        'photos' => 'array'
    ];


    public function driver()
    {
        return $this->belongsTo(Driver::class);
    }

    public function rental()
    {
        return $this->hasMany(Rental::class);
    }
}
