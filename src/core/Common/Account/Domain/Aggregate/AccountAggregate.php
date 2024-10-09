<?php declare(strict_types=1);

namespace Core\Common\Account\Domain\Aggregate;

use Core\Common\Account\Domain\Entity\UserEntity;
use Core\Common\Account\Domain\Entity\RoleEntity;
use Core\Common\Account\Domain\Exception\RoleAlreadyExistsException;
use Core\Common\Account\Domain\Exception\RoleIdNotFoundException;

final class AccountAggregate
{
    private readonly UserEntity $user;
    private array $roles = [];

    public function __construct(UserEntity $user, array $roles = [])
    {
        $this->roles = $roles;
        $this->user = $user;

        $this->ensureUniqueRoles();
    }

    private function ensureUniqueRoles(): void
    {
        $roleIds = [];
        
        foreach ($this->roles as $role)
        {
            $roleId = $role->getId()->asString();

            if (in_array($roleId, $roleIds, true)) {
                throw new RoleAlreadyExistsException(roleId: $roleId);
            }

            $roleIds[] = $roleId;
        }
    }

    public function user(): UserEntity
    {
        return $this->user;
    }

    public function roles(): array
    {
        return array_values(array: $this->roles);
    }

    public function addRoles(RoleEntity $entity): void
    {
        $roleId = $entity->getId()->asString();
        
        if (isset($this->roles[$roleId])) {
            throw new RoleAlreadyExistsException(roleId: $roleId);
        }

        $this->roles[$roleId] = $entity;
    }

    public function removeRole(RoleEntity $entity): void
    {
        $roleId = $entity->getId()->asString();
        
        if (!isset($this->roles[$roleId])) {
            throw new RoleIdNotFoundException(roleId: $roleId);
        }

        unset($this->roles[$roleId]);
    }
}
