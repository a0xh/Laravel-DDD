<?php declare(strict_types=1);

namespace Core\Common\Admin\Account\Domain\Aggregate;

use Core\Common\Admin\Account\Domain\Contract\AggregateRoot;
use Core\Common\Admin\Account\Domain\Entity\UserEntity;

final class AccountAggregate implements AggregateRoot
{
    private readonly UserEntity $user;
    private readonly array $roles;

    public function __construct(UserEntity $user, array $roles = [])
    {
        $this->user = $user;
        $this->roles = $roles;
    }

    public function user(): UserEntity
    {
        return $this->user;
    }

    public function roles(): array
    {
        return $this->roles;
    }

    public function addRole(RoleEntity $role): void
    {
        $this->roles[] = $role;
    }

    public function removeRole(RoleEntity $role): void
    {
        $this->roles = array_filter(
            array: $this->roles,
            callback: function(RoleEntity $value) use ($role) {
                return $value->getUuid() !== $role->getUuid();
            }
        );
    }
}
