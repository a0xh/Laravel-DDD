<?php declare(strict_types=1);

namespace Core\Shared\Domain\ValueObject\User;

use Core\Shared\Domain\Contract\ValueObject;

final class LastName implements ValueObject
{
    private readonly ?string $lastName;

    public function __construct(?string $value)
    {
        $this->lastName = $value;
    }

    public function value(): ?string
    {
        return $this->lastName;
    }
}
