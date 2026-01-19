<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

class AddCoordenadasInmueble
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = Http::get('http://ovc.catastro.meh.es/OVCServWeb/OVCWcfCallejero/COVCCoordenadas.svc/json/Consulta_CPMRC?RefCat='.Str::substr($request->num_catastro,0,14));

        $datosPosicionInmueble=$response->json();

        $request->merge([
            "longitud"=>$datosPosicionInmueble['Consulta_CPMRCResult']['coordenadas']['coord'][0]['geo']['xcen'],
            "latitud"=>$datosPosicionInmueble['Consulta_CPMRCResult']['coordenadas']['coord'][0]['geo']['ycen']
        ]);
        return $next($request);
    }
}
