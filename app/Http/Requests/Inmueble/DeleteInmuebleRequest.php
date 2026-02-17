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
            if($user->hasPermissionTo('borrar inmueble') || $this->inmueble->propietario->id===$user->id){
                return true;
            }else{
                return false;
            }
        }
    }
}
