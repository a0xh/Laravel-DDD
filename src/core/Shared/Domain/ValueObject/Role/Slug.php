<?php declare(strict_types=1);

namespace Core\Shared\Domain\ValueObject\Role;

use Core\Shared\Domain\Contract\RoleVisitable;
use Core\Shared\Domain\Contract\RoleVisitor;

final class Slug implements RoleVisitable
{
    private readonly string $slug;

    public function __construct(string $value)
    {
        $message = 'The Value Cannot Be Empty!';
        
        if (!filled(value: $value)) {
            throw new \InvalidArgumentException(
                message: $message
            );
        }

        $this->slug = $value;
    }

    public function value(): string
    {
        return $this->slug;
    }

    public function accept(RoleVisitor $visitor): string
    {
        return $visitor->visitSlug(name: $this);
    }
}
