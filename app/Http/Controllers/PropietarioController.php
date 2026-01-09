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

        //Necesitamos almacenar el propìetario en la base de datos

        //Necesitamos devolver información al cliente
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Propietario $propietario)
    {
        //
    }
}
