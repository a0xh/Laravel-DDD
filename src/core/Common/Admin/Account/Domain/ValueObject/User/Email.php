<?php declare(strict_types=1);

namespace Core\Shared\Domain\ValueObject\User;

use Core\Shared\Domain\Contract\ValueObject;

final class Email implements ValueObject
{
    private readonly string $email;

    public function __construct(string $value)
    {
        $message = 'The Value Cannot Be Empty!';
        
        if (!filled(value: $value)) {
            throw new \InvalidArgumentException(
                message: $message
            );
        }

        $this->email = $value;
    }

    public function value(): string
    {
        return $this->email;
    }
}