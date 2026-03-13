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

    protected $fillable = ['num_catastro','direccion','bloque','piso','puerta','numero','cod_postal','id_municipio','user_id','latitud','longitud'];
    protected $hidden = ['created_at','updated_at','user_id',];
    protected $with = ['propietario','perfil', 'ciudad'];

    public function ciudad():BelongsTo{
        return $this->belongsTo(Ciudad::class,['cod_postal','id_municipio'],['cod_postal','id_municipio']);
    }

    public function propietario():BelongsTo{
        return $this->BelongsTo(User::class,'user_id','id');
    }

    public function perfil():HasOne{
        return $this->hasOne(Perfil::class);
    }

    public function ofertas():BelongsToMany{
        return $this->belongsToMany(User::class)->withPivotValue(['cantidad','fecha_caducidad'])->withTimestamps();
    }

}
