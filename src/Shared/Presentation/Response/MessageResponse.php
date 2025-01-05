<?php declare(strict_types=1);

namespace Core\Shared\Presentation\Response;

use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\{JsonResponse, Response};

final class MessageResponse implements Responsable
{
    private readonly int $status;
    private readonly string $message;

    public function __construct(int $status, string $message)
    {
        $this->status = $status;
        $this->message = $message;
    }

    public function toResponse($request): JsonResponse
    {
        return new JsonResponse(
            data: [
                'status' => $this->status,
                'data' => [
                    'message' => __(key: $this->message),
                ],
                'metadata' => [
                    'request_id' => str()->uuid()->toString(),
                    'timestamp' => now()->toIso8601String()
                ],
            ],
            status: $this->status
        );
    }
}
