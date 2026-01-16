<?php

namespace Database\Seeders;

use App\Models\Inmueble;
use App\Models\Propietario;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PropietarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Propietario::factory(10)->create();


    }
}
