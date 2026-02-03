<?php

namespace App\Http\Controllers;

use App\Http\Responses\MiRespuesta;
use App\Models\Ciudad;
use Illuminate\Http\Request;

class CiudadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $limit = $request->limit??env('PAGINATE_RESULTS',20);

        return MiRespuesta::ok([Ciudad::paginate($limit)]);
    }



    /**
     * Display the specified resource.
     */
    public function show(Ciudad $ciudad)
    {
        return new MiRespuesta(201,[$ciudad]);
    }


}
