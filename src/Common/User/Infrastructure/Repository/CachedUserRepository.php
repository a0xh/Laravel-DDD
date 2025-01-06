<?php declare(strict_types=1);

namespace Core\Common\User\Infrastructure\Repository;

use Core\Common\User\Domain\Entity\User;
use Core\Common\User\Domain\Repository\UserDecoratorRepository;
use Core\Common\User\Domain\ValueObject\UserId;
use Core\Common\User\Domain\ValueObject\Email;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Cache;

final class CachedUserRepository extends UserDecoratorRepository
{
	private const FRESH_TTL = 900;
	private const GRACE_TTL = 1800;
	private const LOCK_TTL = 10;

	private const CACHE_USER_ALL_KEY = 'users';

	public function __construct(
		private readonly private(set) QueryUserRepository $query,
		private readonly private(set) TransactionUserRepository $transaction,
	) {}

	public function all(): array
    {
        return Cache::flexible(
        	key: self::CACHE_USER_ALL_KEY,
        	ttl: [
        		self::FRESH_TTL,
        		self::GRACE_TTL
        	],
        	callback: fn () => $this->query->all(),
        	lock: ['seconds' => self::LOCK_TTL]
        );
    }

    public function paginate(int $perPage = 11): LengthAwarePaginator
    {
        return $this->query->paginate(perPage: $perPage);
    }

    public function findById(UserId $id): ?User
    {
        return $this->query->findById(id: $id);
    }

    public function findByEmail(Email $email): ?User
    {
        return $this->query->findByEmail(email: $email);
    }

    public function save(User $user): void
    {
        $this->transaction->save(user: $user);

    	if (Cache::has(key: self::CACHE_USER_ALL_KEY)) {
    		Cache::forget(key: self::CACHE_USER_ALL_KEY);
    	}
    }

    public function delete(User $user): void
    {
    	$this->transaction->delete(user: $user);

    	if (Cache::has(key: self::CACHE_USER_ALL_KEY)) {
    		Cache::forget(key: self::CACHE_USER_ALL_KEY);
    	}
    }
}
