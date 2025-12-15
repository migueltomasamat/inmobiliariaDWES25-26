<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Propietario extends Model
{
    /** @use HasFactory<\Database\Factories\PropietarioFactory> */
    use HasFactory;

    public function inmuebles():HasMany{
        return $this->hasMany(Inmueble::class);
    }
}
