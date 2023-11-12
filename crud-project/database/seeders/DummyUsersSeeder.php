<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class DummyUsersSeeder extends Seeder
{
    public function run(): void
    {
        $usersData= [
            [
                'name' => 'Showroom Admin',
                'email' => 'showroom@admin.com',
                'role' => 'Admin',
                'password' => bcrypt('adminadmin')
            ],
            [
                'name' => 'Ahmad Tech',
                'email' => 'admad@tech.com',
                'role' => 'Admin',
                'password' => bcrypt('ahmadadmin')
            ]
        ];

        foreach ($usersData as $Data){
            User::create($Data);
        }
    }
}
