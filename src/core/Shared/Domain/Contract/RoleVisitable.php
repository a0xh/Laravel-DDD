<?php declare(strict_types=1);

namespace Core\Shared\Domain\Contract;

interface RoleVisitable
{
    public function accept(RoleValueObjectVisitor $visitor);
}
