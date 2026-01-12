<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePropietarioRequest;
use App\Http\Requests\UpdatePropietarioRequest;
use App\Models\Propietario;

class PropietarioController extends Controller
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
    public function store(StorePropietarioRequest $request)
    {

        //Necesitamos asociar los datos que nos llegan en la request a una instacia de Propietario
        $propietario = new Propietario();
        $propietario->nombre=$request->nombre;
        $propietario->direccion = $request->direccion;
        $propietario->dni=$request->dni;
        $propietario->telefono=$request->telefono;


        //Necesitamos almacenar el propìetario en la base de datos
        if (!$propietario->save()){
            return response([
                "error"=>true,
                "msg"=>"Ha habido un error al almacenar el propietario",
                "code"=>500
            ],500);
        }else{
            return response([
                "error"=>false,
                "msg"=>"Se ha guardado el propietarios",
                "code"=>201
            ],201);
        }


    }

    /**
     * Display the specified resource.
     */
    public function show(Propietario $propietario)
    {
        return $propietario;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Propietario $propietario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePropietarioRequest $request, Propietario $propietario)
    {
        $propietario->nombre=$request->nombre??$propietario->nombre;
        $propietario->dni=$request->dni??$propietario->dni;
        $propietario->direccion=$request->direccion??$propietario->direccion;
        $propietario->telefono=$request->telefono??$propietario->telefono;

        if (!$propietario->save()){
            return response([
                "error"=>true,
                "msg"=>"Ha habido un error al modificar el propietario",
                "code"=>500
            ],500);
        }else{
            return response([
                "error"=>false,
                "msg"=>"Se ha modificado el propietario",
                "code"=>200
            ],200);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Propietario $propietario)
    {
        if (!$propietario->delete()){
            return response([
                "error"=>true,
                "msg"=>"Ha habido un error al borrar el propietario",
                "code"=>500
            ],500);
        }else{
            return response([
                "error"=>false,
                "msg"=>"Se ha borrado el propietario",
                "code"=>200
            ],200);
        }

    }
}
