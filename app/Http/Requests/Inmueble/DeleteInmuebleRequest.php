<?php

namespace App\Http\Requests\Inmueble;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class DeleteInmuebleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $user = Auth::user();
        if($user->hasRole('Admin')){
            return true;
        }else{
            //dd($user->inmuebles->toArray());
            $inmueblesUsuario = array_filter($user->inmuebles->toArray(),function($inmueble){
                return $inmueble['id']==$this->inmueble->id;
            });
            if($user->hasPermissionTo('borrar inmueble') && $inmueblesUsuario!=null){
                return true;
            }else{
                return false;
            }
        }
    }
}
