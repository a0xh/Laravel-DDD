<?php declare(strict_types=1);

namespace Core\Common\Role\Infrastructure\Repository;

use Core\Common\Role\Domain\Entity\Role;
use Core\Common\Role\Domain\Repository\RoleDecoratorRepository;
use Core\Common\Role\Domain\ValueObject\RoleId;
use Core\Common\Role\Domain\ValueObject\Slug;
use Illuminate\Support\Facades\Cache;

final class CachedRoleRepository extends RoleDecoratorRepository
{
	private const FRESH_TTL = 900;
	private const GRACE_TTL = 1800;
	private const LOCK_TTL = 10;

	private const CACHE_ROLE_ALL_KEY = 'roles';

	public function __construct(
		private private(set) QueryRoleRepository $query,
		private private(set) TransactionRoleRepository $transaction,
	) {}

	public function all(): array
    {
        return Cache::flexible(
        	key: self::CACHE_ROLE_ALL_KEY,
        	ttl: [
        		self::FRESH_TTL,
        		self::GRACE_TTL
        	],
        	callback: fn () => $this->query->all(),
        	lock: ['seconds' => self::LOCK_TTL]
        );
    }

    public function findById(RoleId $id): ?Role
    {
        return $this->query->findById(id: $id);
    }

    public function findBySlug(Slug $slug): ?Role
    {
        return $this->query->findByEmail(email: $email);
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
