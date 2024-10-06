<?php declare(strict_types=1);

namespace Core\Shared\Domain\Aggregate;

abstract class AggregateRoot implements \JsonSerializable
{
    abstract public function toArray(): array;

    public function jsonSerialize(): array
    {
        return $this->toArray();
    }
}
