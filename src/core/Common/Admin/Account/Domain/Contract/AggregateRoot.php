<?php declare(strict_types=1);

namespace Core\Common\Admin\Account\Domain\Contract;

use Core\Common\Admin\Account\Domain\Model\UserModel;
use Core\Common\Admin\Account\Domain\Model\RoleModel;

interface AggregateRoot
{
    public function user(): UserModel;
    public function role(): RoleModel;
}
