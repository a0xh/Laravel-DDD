<?php declare(strict_types=1);

namespace Core\Shared\Domain\ValueObject\User;

final class Password
{
    private readonly string $password;

    public function __construct(string $value)
    {
        $message = 'The Value Cannot Be Empty!';
        
        if (!filled(value: $value)) {
            throw new \InvalidArgumentException(
                message: $message
            );
        }

        $this->password = $value;
    }

    public function value(): string
    {
        return $this->password;
    }
}
