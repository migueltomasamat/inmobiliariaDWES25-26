<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\Ciudad;
use function PHPUnit\Framework\isString;

class CiudadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $fichero = fopen(Storage::path('codigos_postales_municipios.csv'),'r');
        while(($datos=fgetcsv($fichero))!=null){

            $provincia= substr($datos[0],0,2);
            Ciudad::create([
                "cod_postal"=>$datos[0],
                "id_municipio"=>$datos[1],
                "nombre"=>$datos[2],
                "provincia_id"=>(int)substr($datos[0],0,2)
            ]);
            /*DB::table('ciudads')->insert([
                "cod_postal"=>$datos[0],
                    "id_municipio" => $datos[1],
                    "nombre"=>$datos[2],
                    "provincia_id"=>(int)$provincia
            ]);*/
        }

    }
}
