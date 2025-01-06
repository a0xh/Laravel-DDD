<?php declare(strict_types=1);

namespace Core\Shared\Domain\ValueObject;

use Core\Shared\Domain\Exception\InvalidUuidException;
use Ramsey\Uuid\Uuid;

abstract class BaseUuid implements \JsonSerializable
{
    protected protected(set) string $id;

    public function __construct(string $id)
    {
        if (!Uuid::isValid(uuid: $id)) {
            throw new InvalidUuidException(
                message: 'The Provided UUID Is Invalid.'
            );
        }

        $this->id = $id;
    }

    public static function fromString(string $id): static
    {
        return new static(id: $id);
    }

    public static function generate(): static
    {
        return new static(id: Uuid::uuid4()->toString());
    }

    public function equals(self $other): bool
    {
        return $this->id === $other->id;
    }

    public function compareTo(self $other): int
    {
        return strcmp(
            string1: $this->id,
            string2: $other->id
        );
    }

    public function getVersion(): int
    {
        return (int) substr(
            string: $this->id,
            offset: 14,
            length: 1
        );
    }

    public function isEmpty(): bool
    {
        return empty($this->id);
    }

    public function asString(): string
    {
        return $this->id;
    }

    public function __toString(): string
    {
        return $this->id;
    }
}
