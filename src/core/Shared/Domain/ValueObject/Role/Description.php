<?php declare(strict_types=1);

namespace Core\Shared\Domain\ValueObject\Role;

final class Description
{
    private readonly ?string $description;

    public function __construct(?string $value)
    {
        $this->description = $value;
    }

    public static function fromString(string $value): self
    {
        return new self(value: $value);
    }

    public static function fromNullableString(?string $value): ?self
    {
        return $value === null ? null : new self(value: $value);
    }

    public function value(): ?string
    {
        return trim(string: $this->description);
    }
}
