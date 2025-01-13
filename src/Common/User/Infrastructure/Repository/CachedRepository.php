<?php declare(strict_types=1);

namespace Core\Common\User\Infrastructure\Repository;

use Illuminate\Support\Facades\Cache;
use Core\Common\User\Domain\Repository\DecoratorRepository;
use Core\Shared\Domain\Entity\User;
use Core\Shared\Domain\ValueObject\User\UserId;
use Core\Shared\Domain\ValueObject\User\Email;
use Illuminate\Pagination\LengthAwarePaginator;

final class CachedRepository extends DecoratorRepository
{
	private const CACHE_USER_ALL_KEY = 'users';

	public function __construct(
		private readonly private(set) DoctrineRepository $query,
        private readonly private(set) TransactionRepository $transaction,
	) {}

	public function all(): array
    {
        return Cache::flexible(
        	key: self::CACHE_USER_ALL_KEY,
        	ttl: [900, 1800],
        	callback: fn () => $this->query->all(),
        	lock: ['seconds' => 10]
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
