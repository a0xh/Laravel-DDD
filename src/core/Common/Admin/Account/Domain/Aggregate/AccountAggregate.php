<?php declare(strict_types=1);

namespace Core\Common\Admin\Account\Domain\Aggregate;

use Core\Common\Admin\Account\Domain\Contract\AggregateRoot;
use Core\Common\Admin\Account\Domain\Model\{UserModel, RoleModel};

final class AccountAggregate implements AggregateRoot
{
    public function __construct(
        private readonly UserModel $userModel,
        private readonly RoleModel $roleModel
    ) {}

    public function user(): UserModel
    {
        return $this->userModel;
    }

    public function role(): RoleModel
    {
        return $this->roleModel;
    }
}
