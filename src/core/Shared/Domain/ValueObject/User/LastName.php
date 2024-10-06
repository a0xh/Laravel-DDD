<?php declare(strict_types=1);

namespace Core\Shared\Domain\ValueObject\User;

final class LastName
{
    private readonly ?string $lastName;

    public function __construct(?string $value)
    {
        $this->lastName = $value;
    }

    public static function fromString(string $value): self
    {
        return new self(value: $value);
    }

    public static function fromNullableString(?string $value): ?self
    {
        return new self(value: $value);
    }

    public function value(): ?string
    {
        return trim(string: $this->lastName);
    }
}
