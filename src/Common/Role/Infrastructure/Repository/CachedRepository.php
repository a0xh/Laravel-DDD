<?php declare(strict_types=1);

namespace Core\Common\Role\Infrastructure\Repository;

use Core\Shared\Domain\Entity\Role;
use Core\Common\Role\Domain\Repository\DecoratorRepository;
use Core\Shared\Domain\ValueObject\Role\RoleId;
use Core\Shared\Domain\ValueObject\Role\Slug;
use Illuminate\Support\Facades\Cache;

final class CachedRepository extends DecoratorRepository
{
    private const CACHE_ROLE_ALL_KEY = 'roles';

    public function __construct(
        private readonly private(set) QueryRepository $query,
        private readonly private(set) TransactionRepository $transaction,
    ) {}

    public function all(): array
    {
        return Cache::flexible(
            key: self::CACHE_ROLE_ALL_KEY,
            ttl: [900, 1800],
            callback: fn () => $this->query->all(),
            lock: ['seconds' => 10]
        );
    }

    public function findById(RoleId $id): ?Role
    {
        return $this->query->findById(id: $id);
    }

    public function findBySlug(Slug $slug): ?Role
    {
        return $this->query->findBySlug(slug: $slug);
    }

    public function save(Role $role): void
    {
        $this->transaction->save(role: $role);

    	if (Cache::has(key: self::CACHE_ROLE_ALL_KEY)) {
    		Cache::forget(key: self::CACHE_ROLE_ALL_KEY);
    	}
    }

    public function delete(Role $role): void
    {
    	$this->transaction->delete(role: $role);

    	if (Cache::has(key: self::CACHE_ROLE_ALL_KEY)) {
    		Cache::forget(key: self::CACHE_ROLE_ALL_KEY);
    	}
    }
}
