<?php declare(strict_types=1);

namespace Core\Shared\Domain\Exception;

final class EntityOperationException extends \RuntimeException
{
    public const HTTP_INTERNAL_SERVER_ERROR = 500;

    public function __construct(
        string $message,
        int $code = self::HTTP_INTERNAL_SERVER_ERROR,
        \Throwable $previous = null
    ) {
        parent::__construct(
            message: $message,
            code: $code,
            previous: $previous
        );
    }
}
