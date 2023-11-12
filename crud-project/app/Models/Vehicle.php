<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $table = 'vehicle';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = ['type', 'model', 'year', 'manufacturer', 'price'];

    public function car()
    {
        return $this->hasOne(Car::class, 'vehicleID');
    }

    public function truck()
    {
        return $this->hasOne(Truck::class, 'vehicleID');
    }

    public function motorcycle()
    {
        return $this->hasOne(Motorcycle::class, 'vehicleID');
    }

    public function order()
    {
        return $this->hasOne(Order::class, 'vehicleID');
    }

}
