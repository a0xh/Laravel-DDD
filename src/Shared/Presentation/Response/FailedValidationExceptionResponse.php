<?php declare(strict_types=1);

namespace Core\Shared\Presentation\Response;

use Illuminate\Contracts\Support\Responsable;
use Illuminate\Support\MessageBag;
use Illuminate\Http\{JsonResponse, Response};
use Illuminate\Support\Facades\Context;

final class FailedValidationExceptionResponse implements Responsable
{
    private readonly private(set) MessageBag $errors;
    private readonly private(set) int $status;

    public function __construct(MessageBag $errors)
    {
        $this->status = Response::HTTP_UNPROCESSABLE_ENTITY;
        $this->errors = $errors;
    }

    public function toResponse($request): JsonResponse
    {
        return new JsonResponse(
            data: [
                'status' => $this->status,
                'result' => [
                    'message' => __(key: 'Ошибка валидации.'),
                    'errors' => $this->errors
                ],
                'metadata' => [
                    'request_id' => Context::get(key: 'request_id'),
                    'timestamp' => Context::get(key: 'timestamp')
                ],
            ],
            status: $this->status
        );
    }
}
