<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Inmueble extends Model
{
    /** @use HasFactory<\Database\Factories\InmuebleFactory> */
    use HasFactory;

    protected $hidden = ['created_at','updated_at','propietario_id',];
    protected $with = ['propietario','perfil'];

    public function ciudad():BelongsTo{
        return $this->belongsTo(Ciudad::class,'cod_postal','cod_postal');
    }

    public function propietario():BelongsTo{
        return $this->belongsTo(Propietario::class);
    }

    public function perfil():HasOne{
        return $this->hasOne(Perfil::class);
    }

    public function ofertas():BelongsToMany{
        return $this->belongsToMany(User::class)->withPivotValue(['cantidad','fecha_caducidad'])->withTimestamps();
    }

}
