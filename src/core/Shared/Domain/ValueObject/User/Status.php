<?php declare(strict_types=1);

namespace Core\Shared\Domain\ValueObject\User;

final class Status
{
    private readonly bool $status;

    public function __construct(bool $value)
    {
        $message = 'The Value Cannot Be Empty!';
        
        if (!filled(value: $value)) {
            throw new \InvalidArgumentException(
                message: $message
            );
        }

        $this->status = $value;
    }

    public function value(): bool
    {
        return $this->status;
    }
}
