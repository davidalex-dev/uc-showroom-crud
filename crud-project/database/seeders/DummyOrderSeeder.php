<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Order;

class DummyOrderSeeder extends Seeder
{
    public function run(): void
    {


        $orderData= [
            [
                'customerID' => '1',
                'vehicleID' => '3',
                'total' => '2',
            ],
            [
                'customerID' => '2',
                'vehicleID' => '1',
                'total' => '3',
            ],
            [
                'customerID' => '2',
                'vehicleID' => '2',
                'total' => '4',
            ],
        ];

        foreach ($orderData as $Data){
            Order::create($Data);
        }
    }
}
