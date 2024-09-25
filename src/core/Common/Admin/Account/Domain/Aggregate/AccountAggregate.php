<?php declare(strict_types=1);

namespace Core\Common\Admin\Account\Domain\Aggregate;

use Core\Common\Admin\Account\Domain\Model\{UserModel, RoleModel};
use Core\Common\Admin\Account\Domain\Entity\{UserEntity, RoleEntity};
use Core\Common\Admin\Account\Domain\Contract\AggregateRoot;
use Core\Shared\Domain\ValueObject\Role\RoleId;

final class AccountAggregate implements AggregateRoot
{
    private readonly UserModel $userModel;
    private readonly RoleModel $roleModel;

    public function __construct(UserModel $user, RoleModel $role)
    {
        $this->userModel = $user;
        $this->roleModel = $role;
    }

    public function add(UserEntity $user, RoleEntity $role): void
    {
        $this->userModel->save(entity: $user);
        $this->roleModel->save(entity: $role);
    }

    public function with(UserEntity $user, RoleId $id): void
    {
        $user->roles[$id->asString()] = $this->roleModel->find(uuid: $id);
    }

    public function get(): array
    {
        return $this->userModel->all();
    }
}
