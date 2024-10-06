<?php declare(strict_types=1);

namespace Core\Shared\Domain\ValueObject\User;

final class Password
{
    private readonly ?string $password;

    public function __construct(?string $value)
    {
        $this->password = $value;
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
        return $this->password ?? null;
    }
}
