<?php declare(strict_types=1);

namespace Core\Common\Admin\Account\Domain\Contract;

use Core\Common\Admin\Account\Domain\Entity\{UserEntity, RoleEntity};
use Core\Shared\Domain\ValueObject\Role\RoleId;

interface AggregateRoot
{
    public function add(UserEntity $user, RoleEntity $role): void;
    public function with(UserEntity $user, RoleId $id): void;
    public function get(): array;
}
