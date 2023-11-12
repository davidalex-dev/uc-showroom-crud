<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Vehicle;
use App\Models\Car;
use App\Models\Truck;
use App\Models\Motorcycle;

class DummyVehicleSeeder extends Seeder
{
    public function run(): void
    {
        $vehiclesData=[

            [
                'type' => 'Car',
                'model' => 'Air EV',
                'year' => '2023',
                'manufacturer' => 'Wuling',
                'price' => '180000000',
            ],
            [
                'type' => 'Truck',
                'model' => 'Semi',
                'year' => '2024',
                'manufacturer' => 'Tesla',
                'price' => '720000000',
            ],
            [
                'type' => 'Car',
                'model' => 'Omoda 5',
                'year' => '2024',
                'manufacturer' => 'Chery',
                'price' => '256000000',
            ],
            [
                'type' => 'Motorcycle',
                'model' => 'Ninja 300',
                'year' => '2024',
                'manufacturer' => 'Kawasaki',
                'price' => '320000000',
            ],
            [
                'type' => 'Motorcycle',
                'model' => 'Genio',
                'year' => '2021',
                'manufacturer' => 'Honda',
                'price' => '380000000',
            ],
            [
                'type' => 'Truck',
                'model' => '300',
                'year' => '2022',
                'manufacturer' => 'Hino',
                'price' => '480000000',
            ],

        ];

        foreach ($vehiclesData as $Data){
            $vehicle = Vehicle::create($Data);

            if ($vehicle->type === 'Car') {
                Car::create([
                    'vehicleID' => $vehicle->id,
                    'fuelType' => 'Petrol',
                    'trunkArea' => '720 L',
                    'seats' => '5'
                ]);
            }

            if ($vehicle->type === 'Motorcycle') {
                Motorcycle::create([
                    'vehicleID' => $vehicle->id,
                    'petrolCapacity' => '330',
                    'trunkSize' => '480 L',
                ]);
            }

            if ($vehicle->type === 'Truck') {
                Truck::create([
                    'vehicleID' => $vehicle->id,
                    'numTires' => '4',
                    'cargoArea' => '1000 L',
                    'seats' => '2'
                ]);
            }

        }

    }
}
