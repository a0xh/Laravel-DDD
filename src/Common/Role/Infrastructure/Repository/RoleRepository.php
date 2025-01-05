<?php declare(strict_types=1);

namespace Core\Common\Role\Infrastructure\Repository;

use Core\Common\Role\Domain\Entity\Role;
use Core\Common\Role\Domain\Repository\RoleDecoratorRepository;
use Core\Common\Role\Domain\ValueObject\RoleId;
use Core\Common\Role\Domain\ValueObject\Slug;

final class RoleRepository extends RoleDecoratorRepository
{
    public function __construct(
        private private(set) CachedRoleRepository $cached,
        private private(set) MemoryRoleRepository $memory
    ) {
        $this->initializeCollection();
    }

    private function initializeCollection(): void
    {
        if (count(value: $this->memory->all()) === 0) {
            $collection = collect(value: $this->cached->all());
            
            $collection->each(callback: function(Role $role): void {
                $this->memory->save(role: $role);
            });
        }
    }

    public function all(): array
    {
        $memory = $this->memory->all();

        if (!empty($memory)) {
            return $memory;
        }

        $cached = $this->cached->all();

        return $cached;
    }

    public function findById(RoleId $id): ?Role
    {
        $memory = $this->memory->findById(id: $id);

        if ($memory !== null) {
            return $memory;
        }

        $cached = $this->cached->findById(id: $id);

        return $cached;
    }

    public function findBySlug(Slug $slug): ?Role
    {
        $memory = $this->memory->findByEmail(email: $email);

        if ($memory !== null) {
            return $memory;
        }
        
        $cached = $this->cached->findByEmail(email: $email);
        
        return $cached;
    }

    public function save(Role $role): void
    {
        $this->memory->save(role: $role);
        $this->cached->save(role: $role);
    }

    public function delete(Role $role): void
    {
        $this->memory->delete(role: $role);
        $this->cached->delete(role: $role);
    }
}
