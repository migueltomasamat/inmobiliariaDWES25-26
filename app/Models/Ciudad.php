<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Ciudad extends Model
{
    //
    public $incrementing = false;
    protected $fillable = [
        "cod_postal",
        "id_municipio",
        "nombre",
        "provincia_id"
    ];

    protected $hidden = ['created_at','updated_at'];

    protected $primaryKey = ["cod_postal",'id_municipio'];

    public function inmuebles():HasMany{
        return $this->hasMany(Inmueble::class,['cod_postal','id_municipio'],['cod_postal','id_municipio']);
    }

    public static function obtenerCodPostalAleatorio():array{

            $ciudad=Ciudad::inRandomOrder()->first();
            $retorno []=$ciudad->attributes['cod_postal'];
            $retorno []=$ciudad->attributes['id_municipio'];
            return $retorno;
    }
}
