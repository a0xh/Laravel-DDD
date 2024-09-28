<?php declare(strict_types=1);

namespace Core\Common\Admin\Account\Domain\Contract;

use Core\Common\Admin\Account\Domain\Abstract\RoleVisitor;

interface RoleVisitable
{
    public function accept(RoleVisitor $visitor);
}
