<?php declare(strict_types=1);

namespace Core\Shared\Presentation\Response;

use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\{JsonResponse, Response};

final class ResourceResponse implements Responsable
{
    private readonly private(set) mixed $data;

    public function __construct(mixed $data)
    {
        $this->data = $data;
    }
    
    public function toResponse($request): JsonResponse
    {
        return new JsonResponse(
            data: [
                'status' => Response::HTTP_OK,
                'data' => $this->data,
                'metadata' => [
                    'request_id' => str()->uuid()->toString(),
                    'timestamp' => now()->toIso8601String()
                ],
            ],
            status: Response::HTTP_OK
        );
    }
}
