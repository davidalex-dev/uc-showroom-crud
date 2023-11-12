<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Motorcycle extends Vehicle
{
    protected $primaryKey = 'vehicleID';
    protected $table = 'motorcycle';
    protected $fillable = ['vehicleID', 'trunkSize', 'petrolCapacity'];

    
    public function vehicle(){
        return $this->belongsTo(Vehicle::class, 'vehicleID');
    }

}
