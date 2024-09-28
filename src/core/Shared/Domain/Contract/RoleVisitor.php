<?php declare(strict_types=1);

namespace Core\Shared\Domain\Contract;

use Core\Shared\Domain\ValueObject\Role\{Name, Slug, Uuid};

abstract class RoleVisitor
{
    abstract public function visitUuid(Uuid $uuid);
    abstract public function visitSlug(Slug $slug);
    abstract public function visitName(Name $name);
}