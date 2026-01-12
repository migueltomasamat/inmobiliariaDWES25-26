<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreInmuebleRequest;
use App\Http\Requests\UpdateInmuebleRequest;
use App\Models\Inmueble;
use Illuminate\Http\Request;

class InmuebleController extends Controller
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
    public function store(StoreInmuebleRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Inmueble $inmueble)
    {
        return $inmueble;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Inmueble $inmueble)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateInmuebleRequest $request, Inmueble $inmueble)
    {
        $inmueble->perfil=$request->perfil;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Inmueble $inmueble)
    {
        //
    }

    public function attachPerfil(Request $request,Inmueble $inmueble)
    {
        $inmueble->perfil=$request->perfil;
        $inmueble->save();
    }
}
