<?php declare(strict_types=1);

namespace Core\Common\Role\Infrastructure\Repository;

use Core\Shared\Domain\Entity\Role;
use Core\Common\Role\Domain\Repository\DecoratorRepository;
use Core\Shared\Domain\ValueObject\Role\RoleId;
use Core\Shared\Domain\ValueObject\Role\Slug;

final class MemoryRepository extends DecoratorRepository
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
