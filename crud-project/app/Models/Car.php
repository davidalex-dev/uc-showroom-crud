<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Vehicle
{
    protected $primaryKey = 'vehicleID';
    protected $table = 'car';
    protected $fillable = ['vehicleID', 'fuelType', 'trunkArea', 'seats'];

    public function vehicle(){
        return $this->belongsTo(Vehicle::class, 'vehicleID');
    }

}
