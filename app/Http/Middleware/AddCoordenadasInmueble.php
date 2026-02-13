<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;
use function Laravel\Prompts\error;

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

        $response=$response->json();
        if (isset($response['Consulta_CPMRCResult']['lerr'])){
            return response([
                "error"=>true,
                "message"=>$response['Consulta_CPMRCResult']['lerr'][0]['des']
            ],400);
        }else{

            $request->merge([
                "longitud"=>$response['Consulta_CPMRCResult']['coordenadas']['coord'][0]['geo']['xcen'],
                "latitud"=>$response['Consulta_CPMRCResult']['coordenadas']['coord'][0]['geo']['ycen']
            ]);
            return $next($request);
        }
    }
}
