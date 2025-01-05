<?php declare(strict_types=1);

namespace Core\Common\Role\Infrastructure\Repository;

use Core\Common\Role\Domain\Entity\Role;
use Core\Common\Role\Domain\Repository\RoleDecoratorRepository;
use Core\Common\Role\Domain\ValueObject\RoleId;
use Core\Common\Role\Domain\ValueObject\Slug;

final class MemoryRoleRepository extends RoleDecoratorRepository
{
    private private(set) array $collection;

    public function __construct(array $roles = [])
    {
        $this->collection = $roles;
    }

    public function all(): array
    {
        return array_values(array: $this->collection);
    }

    public function findById(RoleId $id): ?Role
    {
        return $this->collection[$id->asString()] ?? null;
    }

    public function findBySlug(Slug $slug): ?Role
    {
        return $this->collection[$slug->asString()] ?? null;
    }

    public function save(Role $role): void
    {
        $this->collection[] = $role;
    }

    public function delete(Role $role): void
    {
        unset($this->collection[$role->getId()->asString()]);
    }
}
