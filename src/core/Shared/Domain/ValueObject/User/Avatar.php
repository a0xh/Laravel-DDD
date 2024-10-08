<?php declare(strict_types=1);

namespace Core\Shared\Domain\ValueObject\User;

final class Avatar
{
    private readonly ?string $avatar;

    public function __construct(?string $value)
    {
        $this->avatar = $value;
    }

    public static function fromString(string $value): self
    {
        return new self(value: $value);
    }

    public static function fromNullableString(?string $value): ?self
    {
        return new self(value: $value);
    }

    public function value()
    {
        return $this->avatar;
    }
}
