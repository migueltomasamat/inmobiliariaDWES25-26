<?php

namespace App\Http\Responses;

use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\JsonResponse;

class MiRespuesta implements Responsable
{
    protected int $httpCode;
    protected array $data;
    protected string $errorMessage;
    public function __construct(int $httpCode, array $data = [], string $errorMessage = '')
    {
        if ($httpCode<200 || $httpCode>600) {
            throw new \RuntimeException($httpCode . ' no es un código http válido');
        }

        $this->httpCode = $httpCode;
        $this->data = $data;
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

    public static function notFound(string $errorMessage = "Elemento no encontrado")
    {
        return new static(404, errorMessage: $errorMessage);
    }

}
