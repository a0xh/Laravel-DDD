<?php declare(strict_types=1);

namespace Core\Shared\Domain\ValueObject\Role;

final class RoleId
{
    private readonly string $id;

    public function __construct(string $value)
    {
        $this->id = $value;
    }

    public static function fromString(string $value): self
    {
        return new self(value: $value);
    }

    public static function fromNullableString(?string $value): ?self
    {
        return $value === null ? null : new self(value: $value);
    }

    public function asString(): string
    {
        return trim(string: $this->id);
    }
}
