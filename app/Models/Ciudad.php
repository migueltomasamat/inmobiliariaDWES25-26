<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Ciudad extends Model
{
    //
    protected $fillable = [
        "cod_postal",
        "nombre",
        "cod_provincia"
    ];

    protected $primaryKey = "cod_postal";

    public function inmuebles():HasMany{
        return $this->hasMany(Inmueble::class,'cod_postal','cod_postal');
    }

    public static function crearNumCatastroAleatorio():string{
        $finca=mt_rand(0,9999999);
        $hoja=Str::random(7);
        $inmueble=mt_rand(0,9999);
        $control=Str::random(2);

        return $finca.$hoja.$inmueble.$control;
    }
    public static function obtenerCodPostalAleatorio():int{
        return 10421;
    }
}
