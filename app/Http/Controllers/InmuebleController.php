<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreInmuebleRequest;
use App\Http\Requests\UpdateInmuebleRequest;
use App\Models\Inmueble;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\In;
use Inertia\Inertia;

class InmuebleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('inmuebles/inmuebles',[
            "inmuebles"=>Inmueble::latest()->take(5)->get(),
            "estadisticas"=>[
                "total_inmuebles"=>Inmueble::count(),
                "inmuebles_ultimo_mes"=>Inmueble::where('created_at','>',Carbon::now()->subMonth())->count()
            ]
        ]);
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
        $inmueble = Inmueble::create($request->all('num_catastro','numero','puerta','piso','bloque','direccion','cod_postal','propietario_id','latitud','longitud'));

        if ($inmueble){
            return response([
                "error"=>false,
                "message"=>"Inmueble creado correctamente",
                "data"=>$inmueble,
                "code"=>201
            ]);
        }else{
            return response([
                "error"=>true,
                "message"=>"No se ha podido crear el Inmueble",
                "code"=>400
            ]);
        }



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
        dd($inmueble);
    }

    public function attachPerfil(Request $request,Inmueble $inmueble)
    {
        $inmueble->perfil=$request->perfil;
        $inmueble->save();
    }
}
