<?php declare(strict_types=1);

namespace Core\Common\Admin\Account\Domain\ValueObject\Role;

use Core\Common\Admin\Account\Domain\Contract\RoleVisitable;
use Core\Common\Admin\Account\Domain\Abstract\RoleVisitor;
use Ramsey\Uuid\Exception\InvalidUuidStringException;
use Ramsey\Uuid\Uuid as RamseyUuid;

final class Uuid implements RoleVisitable
{
    private readonly string $uuid;

    public function __construct(string $value)
    {
        $this->uuid = $this->validate(value: $value);
    }

    private function validate(string $value): string
    {
        if (!filled(value: $value)) {
            throw new \InvalidArgumentException(
                message: 'The Meaning Of The UUID Cannot Be Empty!'
            );
        }

        try {
            RamseyUuid::fromString(uuid: $value);
        }

        catch (InvalidUuidStringException $e) {
            throw new \InvalidArgumentException(
                message: 'The Provided String Is Not A Valid UUID!'
            );
        }

        return trim(string: $value, characters: " \n\r\t\v\x00");
    }

    public static function fromString(string $value): self
    {
        return new self(value: $value);
    }

    public function accept(RoleVisitor $visitor)
    {
        return $visitor->visitUuid(uuid: $this);
    }

    public function value(): string
    {
        return $this->uuid;
    }
}
