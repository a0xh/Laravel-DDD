<?php declare(strict_types=1);

namespace Core\Shared\Domain\ValueObject\User;

final class Status
{
    private readonly bool $status;

    public function __construct(bool $value)
    {
        $this->status = $value;
    }

    public static function fromBoolean(bool $value): self
    {
        return new self(value: $value);
    }

    public static function fromNullableBoolean(?bool $value): ?self
    {
        return $value === null ? null : new self(value: $value);
    }

    public function value(): bool
    {
        return $this->status;
    }
}
