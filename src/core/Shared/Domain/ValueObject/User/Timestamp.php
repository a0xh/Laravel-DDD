<?php declare(strict_types=1);

namespace Core\Shared\Domain\ValueObject\User;

final class Timestamp
{
    public readonly string $date;

    public function __construct(string $value)
    {
        $this->date = $value;
    }

    public static function fromString(string $value): self
    {
        return new self(value: $value);
    }

    public static function fromNullableString(?string $value): ?self
    {
        return $value === null ? null : new self(value: $value);
    }

    public function value(): string
    {
        return $this->date;
    }
}