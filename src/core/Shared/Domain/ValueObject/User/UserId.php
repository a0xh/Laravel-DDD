<?php declare(strict_types=1);

namespace Core\Shared\Domain\ValueObject\User;

use Core\Shared\Domain\Contract\ValueObjectContract;

final class UserId implements ValueObjectContract
{
    private readonly string $id;

    public function __construct(string $value)
    {
        $message = 'The Value Cannot Be Empty!';
        
        if (!filled(value: $value)) {
            throw new \InvalidArgumentException(
                message: $message
            );
        }

        $this->id = $value;
    }

    public function value(): string
    {
        return $this->id;
    }
}
