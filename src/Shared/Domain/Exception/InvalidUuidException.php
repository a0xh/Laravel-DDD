<?php declare(strict_types=1);

namespace Core\Shared\Domain\Exception;

final class InvalidUuidException extends \InvalidArgumentException
{
    public const CODE_INVALID_UUID = 400;

    public function __construct(
        string $message,
        int $code = self::CODE_INVALID_UUID,
        \Throwable $previous = null
    ) {
        parent::__construct(
            message: $message,
            code: $code,
            previous: $previous
        );
    }
}
