<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
}
