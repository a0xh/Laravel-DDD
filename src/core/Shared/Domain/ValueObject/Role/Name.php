<?php declare(strict_types=1);

namespace Core\Shared\Domain\ValueObject\Role;

use Core\Shared\Domain\Contract\RoleVisitable;
use Core\Shared\Domain\Contract\RoleVisitor;

final class Name implements RoleVisitable
{
    private readonly string $name;

    public function __construct(string $value)
    {
        $message = 'The Value Cannot Be Empty!';

        if (!filled(value: $value)) {
            throw new \InvalidArgumentException(
                message: $message
            );
        }

        $this->name = $value;
    }

    public function value(): string
    {
        return $this->name;
    }

    public function accept(RoleVisitor $visitor): string
    {
        return $visitor->visitName(name: $this);
    }
}
