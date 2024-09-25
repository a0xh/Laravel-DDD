<?php declare(strict_types=1);

namespace Core\Shared\Presentation\Response;

use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\{JsonResponse, Response};

final class JsonResponder implements Responsable
{
    public function __construct(
        private int $status = Response::HTTP_OK,
        private AnonymousResourceCollection $data,
        private array $headers = [
            'Content-Type' => 'application/json'
        ]
    ) {}
    
    public function toResponse($request): JsonResponse
    {
        return new JsonResponse(
            status: $this->status,
            data: $this->data,
            headers: $this->headers,
            json: false
        );
    }
}
