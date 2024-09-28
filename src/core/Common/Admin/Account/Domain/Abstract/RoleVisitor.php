<?php declare(strict_types=1);

namespace Core\Common\Admin\Account\Domain\Abstract;

use Core\Common\Admin\Account\Domain\ValueObject\Role\Uuid;
use Core\Common\Admin\Account\Domain\ValueObject\Role\Name;
use Core\Common\Admin\Account\Domain\ValueObject\Role\Slug;

abstract class RoleVisitor
{
    abstract public function visitUuid(Uuid $uuid);
    abstract public function visitName(Name $name);
    abstract public function visitSlug(Slug $slug);
}