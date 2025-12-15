<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\Ciudad;

class CiudadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $fichero = fopen(Storage::path('municipios.csv'),'r');
        while(($datos=fgetcsv($fichero))!=null){

            Ciudad::create([
                "cod_postal"=>$datos[0],
                "nombre"=>$datos[1],
                "cod_provincia"=>$datos[2]
            ]);
            /*DB::table('ciudads')->insert([
                "cod_postal"=>$datos[0],
                    "nombre"=>$datos[1],
                    "cod_provincia"=>$datos[2]
            ]);*/
        }

    }
}
