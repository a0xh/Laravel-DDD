<?php declare(strict_types=1);

namespace Core\Shared\Presentation\Response;

use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\{JsonResponse, Response};
use Illuminate\Support\Facades\Context;

final class MessageResponse implements Responsable
{
    public function __construct(
        private readonly private(set) string $message,
        private readonly private(set) int $status,
    ) {}

    public function toResponse($request): JsonResponse
    {
        $requestId = Context::get(key: 'request_id');
        $timestamp = Context::get(key: 'timestamp');

        return new JsonResponse(
            data: [
                'status' => $this->status,
                'data' => [
                    'message' => __(key: $this->message),
                ],
                'metadata' => [
                    'request_id' => $requestId,
                    'timestamp' => $timestamp
                ],
            ],
            status: $this->status
        );
    }
}
