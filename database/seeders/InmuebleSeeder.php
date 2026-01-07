<?php

namespace Database\Seeders;

use App\Models\Inmueble;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InmuebleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Inmueble::factory(5)->hasPerfil()->create();
    }
}
