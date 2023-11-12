<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Truck extends Vehicle
{
    protected $primaryKey = 'vehicleID';
    protected $table = 'truck';
    protected $fillable = ['vehicleID', 'numTires', 'cargoArea', 'seats'];

    public function vehicle(){
        return $this->belongsTo(Vehicle::class, 'vehicleID');
    }

}
