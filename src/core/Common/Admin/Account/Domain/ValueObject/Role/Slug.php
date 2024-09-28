<?php declare(strict_types=1);

namespace Core\Common\Admin\Account\Domain\ValueObject\Role;

use Core\Common\Admin\Account\Domain\Contract\RoleVisitable;
use Core\Common\Admin\Account\Domain\Abstract\RoleVisitor;

final class Slug implements RoleVisitable
{
    private readonly string $slug;

    private const MAX_LENGTH = 65;
    private const MIN_LENGTH = 1;

    public function __construct(string $value)
    {
        $this->slug = $this->validate(value: $value);
    }

    private function validate(string $value): string
    {
        if (!filled(value: $value)) {
            throw new \InvalidArgumentException(
                message: 'The Meaning Of The Slug Cannot Be Empty!'
            );
        }

        if (strlen(string: $value) > self::MAX_LENGTH) {
            throw new \InvalidArgumentException(
                message: 'The Slug Cannot Exceed 65 Characters!'
            );
        }

        if (strlen(string: $value) < self::MIN_LENGTH) {
            throw new \InvalidArgumentException(
                message: 'The Slug Must Be At Least 1 Character Long!'
            );
        }

        if (!preg_match(pattern: '/^[a-zA-Z0-9\-]+$/', subject: $value)) {
            throw new \InvalidArgumentException(
                message: 'The Slug Contains Invalid Characters!'
            );
        }

        return trim(string: $value, characters: " \n\r\t\v\x00");
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
        return $this->slug === $other->slug;
    }

    public function hashCode(): int
    {
        return hash(algo: 'sha256', data: $this->slug);
    }

    public function accept(RoleVisitor $visitor)
    {
        return $visitor->visitSlug(slug: $this);
    }

    public function value(): string
    {
        return $this->slug;
    }
}
