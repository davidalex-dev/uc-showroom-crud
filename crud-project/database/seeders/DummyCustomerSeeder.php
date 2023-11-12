<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Customer;

class DummyCustomerSeeder extends Seeder
{
    public function run(): void
    {
        $customerData= [
            [
                'name' => 'John Doe',
                'address' => 'JL. Raya Darmo',
                'telephoneNumber' => '081081081081',
                'IDcard' => '13376942055'
            ],
            [
                'name' => 'Jane Doe',
                'address' => 'Citraland',
                'telephoneNumber' => '081123087912',
                'IDcard' => '12345678901'
            ],
        ];

        foreach ($customerData as $Data){
            Customer::create($Data);
        }
    }
}
