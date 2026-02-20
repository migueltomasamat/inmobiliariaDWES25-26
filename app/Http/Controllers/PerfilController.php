<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePerfilRequest;
use App\Http\Requests\UpdatePerfilRequest;
use App\Models\Inmueble;
use App\Models\Perfil;
use Illuminate\Support\Facades\Storage;

class PerfilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePerfilRequest $request,Inmueble $inmueble)
    {
        if(isset($request->imagen)){
            //Creamos un directorio dentro del apartado público con el número de catastro
            Storage::disk('public')->makeDirectory($inmueble->num_catastro);

            //Comprobamos el número de imagenes que existen en el directorio
            $ficheros=Storage::disk('public')->files($inmueble->num_catastro);

            //Calculamos el siguiente fichero que toca almacenar
            $sufijo = count($ficheros)+1;

            //Guardamos el fichero dentro del directorio que acabamos de crear
            $ruta=Storage::disk('public')->putFileAs($inmueble->num_catastro,$request->file('imagen'),'imagen'.$sufijo.'.png');

            $url = Storage::url($ruta);
        }

        $perfil = new Perfil();
        $perfil->tipo = $request->tipo??'piso';
        $perfil->ascensor = $request->ascensor??false;
        $perfil->metros = $request->metros??0;
        $perfil->clase_energetica = $request->clase_energetica??null;
        $perfil->imagen = $url??null;
        $perfil->inmueble_id = $inmueble->id;

        $perfil->save();


    }

    /**
     * Display the specified resource.
     */
    public function show(Perfil $perfil)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Perfil $perfil)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePerfilRequest $request, Perfil $perfil)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Perfil $perfil)
    {
        //
    }
}
