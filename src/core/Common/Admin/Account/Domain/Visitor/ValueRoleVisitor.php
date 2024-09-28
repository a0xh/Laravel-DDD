<?php declare(strict_types=1);

namespace Core\Common\Admin\Account\Domain\Visitor;

use Core\Common\Admin\Account\Domain\Abstract\RoleVisitor;
use Core\Common\Admin\Account\Domain\ValueObject\Role\Uuid;
use Core\Common\Admin\Account\Domain\ValueObject\Role\Name;
use Core\Common\Admin\Account\Domain\ValueObject\Role\Slug;

final class ValueRoleVisitor extends RoleVisitor
{
    public function visitUuid(Uuid $uuid): string
    {
        return $uuid->value();
    }

    public function visitName(Name $name): string
    {
        return $name->value();
    }

    public function visitSlug(Slug $slug): string
    {
        return $slug->value();
    }
}
