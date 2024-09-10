<?php declare(strict_types=1);

namespace Core\Common\User\Auth\Domain\ValueObjects;

final class PasswordValueObject
{
    public readonly ?string $value;

    public function __construct(
        string $password, string $confirmation
    ) {
        if ($password && strlen($password) < 8) {
            throw new \DomainException();
        }

        if ($password !== $confirmation) {
            throw new \DomainException();
        }

        $this->value = $password;
    }

    public static function fromString(
        string $password, string $confirmation
    ): self {
        return new self(
            password: $password,
            confirmation: $confirmation
        );
    }

    public function isNotEmpty(): bool
    {
        return $this->value !== null;
    }
}