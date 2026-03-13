<?php

namespace Database\Seeders;

use App\Models\Provincia;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class ProvinciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $fichero = fopen(Storage::path('provincias.csv'),'r');
        while(($provincia=fgetcsv($fichero))!=null){
            Provincia::create([
                "codigo"=>$provincia[0],
                "nombre"=>$provincia[2],
                "cod_telefonico"=>$provincia[3]
            ]);
        }
    }
}
