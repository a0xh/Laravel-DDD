<?php declare(strict_types=1);

namespace Core\Common\Admin\Account\Domain\ValueObject\Role;

use Core\Common\Admin\Account\Domain\Contract\RoleVisitable;
use Core\Common\Admin\Account\Domain\Abstract\RoleVisitor;

final class Name implements RoleVisitable
{
    private readonly string $name;

    private const MAX_LENGTH = 44;
    private const MIN_LENGTH = 3;

    public function __construct(string $value)
    {
        $this->validate(value: $value);

        $this->name = trim(
            string: $value,
            characters: " \n\r\t\v\x00"
        );
    }

    private function validate(string $value): void
    {
        if (!filled(value: $value)) {
            throw new \InvalidArgumentException(
                message: 'The Meaning Of The Name Cannot Be Empty!'
            );
        }

        if (strlen(string: $value) > self::MAX_LENGTH) {
            throw new \InvalidArgumentException(
                message: 'The Name Cannot Exceed 44 Characters!'
            );
        }

        if (strlen(string: $value) < self::MIN_LENGTH) {
            throw new \InvalidArgumentException(
                message: 'The Name Must Be At Least 3 Character Long!'
            );
        }

        if (!preg_match(pattern: '/^[a-zA-Z0-9\s\-]+$/', subject: $value)) {
            throw new \InvalidArgumentException(
                message: 'The Name Contains Invalid Characters!'
            );
        }

        if (preg_match(pattern: '/\s{2,}/', subject: $value)) {
            throw new \InvalidArgumentException(
                message: 'The Name Cannot Contain Consecutive Spaces!'
            );
        }
    }

    public function accept(RoleVisitor $visitor)
    {
        return $visitor->visitName(name: $this);
    }

    public static function fromString(string $value): self
    {
        return new self(value: $value);
    }

    public static function fromNullableString(?string $value): ?self
    {
        return $value === null ? null : new self(value: $value);
    }

    public function equals(self $other): bool
    {
        return $this->name === $other->name;
    }

    public function hashCode(): int
    {
        return hash(algo: 'sha256', data: $this->name);
    }

    public function value(): string
    {
        return $this->name;
    }
}
