<?php

namespace App\Http\Responses;

use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\JsonResponse;

class MiRespuesta implements Responsable
{
    protected bool $error;
    protected int $httpCode;
    protected array $data;
    protected string $errorMessage;
    public function __construct(int $httpCode, array $data = [], bool $error=false,string $errorMessage = '')
    {
        if ($httpCode<200 || $httpCode>600) {
            throw new \RuntimeException($httpCode . ' no es un código http válido');
        }

        $this->httpCode = $httpCode;
        $this->data = $data;
        $this->error = $error;
        $this->errorMessage = $errorMessage;
    }

    public function toResponse($request):JsonResponse
    {
        $payload = match (true) {
            $this->httpCode >= 500 => ['message' => 'Error de Servidor'],
            $this->httpCode >= 400 => ['message' => $this->errorMessage],
            $this->httpCode >= 300 => ['message' => $this->errorMessage],
            $this->httpCode >= 200 => ['data' => $this->data],
        };

        return response()->json(
            data: $payload,
            status: $this->httpCode,
            options: JSON_UNESCAPED_UNICODE
        );
    }

    public static function ok(array $data)
    {
        return new static(200, $data);
    }

    public static function created(array $data)
    {
        return new static(201, $data);
    }
    public static function badRequest(string $errorMessage = "Datos proporcionados incorrectos"){
        return new static(400,error: true,errorMessage: $errorMessage);
    }

    public static function autorizationFail(string $errorMessage = "No autorizado, token invalido"){
        return new static(401,error: true,errorMessage: $errorMessage);
    }

    public static function notAutorized(string $errorMessage = "Sin permisos para acceder a este apartado"){
        return new static(403,error: true,errorMessage: $errorMessage);
    }

    public static function notFound(string $errorMessage = "Elemento no encontrado")
    {
        return new static(404, error: true,errorMessage: $errorMessage);
    }

    public static function serverError(string $errorMessage = "Error de servidor"){
        return new static (500,error: true,errorMessage: $errorMessage);
    }

}
