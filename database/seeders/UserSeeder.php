<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory(10)->create()->each(function($user) {
            $user->assignRole('Usuario');
        });

        User::create([
            "name"=>'Administrador',
            "email"=>"admin@dawmobiliaria.com",
            "password"=>Hash::make('123456789')
        ])->assignRole('Admin');


        User::create([
            "name"=>'Agente',
            "email"=>"agente@dawmobiliaria.com",
            "password"=>Hash::make('123456789')
        ])->assignRole('Agente');

        User::create([
            "name"=>'Usuario',
            "email"=>"Usuario@dawmobiliaria.com",
            "password"=>Hash::make('123456789')
        ])->assignRole('Usuario');
    }
}
