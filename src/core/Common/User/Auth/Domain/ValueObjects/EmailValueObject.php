<?php declare(strict_types=1);

namespace Core\Common\User\Auth\Domain\ValueObjects;

final class EmailValueObject
{
    private string $email;

    public function __construct(
        string $email, $isOptional = false
    ) {
        if (!$email && !$isOptional) {
            throw new \DomainException();
        }

        if (!filter_var(
            value: $email,
            filter: FILTER_VALIDATE_EMAIL
        )) {
            throw new \DomainException();
        }

        $this->email = $email;
    }

    public function __toString(): string
    {
        return $this->email;
    }
}
