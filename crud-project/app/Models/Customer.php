<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'customer';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'address', 'telephoneNumber', 'IDcard'];

    public function orders()
    {
        return $this->hasMany(Order::class, 'customerID', 'id');
    }

}