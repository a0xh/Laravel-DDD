<?php declare(strict_types=1);

namespace Core\Common\User\Auth\Domain\ValueObjects;

final class NameValueObject
{
    private string $name;

    public function __construct(string $name)
    {
        if (!$name) {
            throw new \DomainException();
        }

        $this->name = $name;
    }

    public function __toString(): string
    {
        return $this->name;
    }
}