<?php declare(strict_types=1);

namespace Core\Common\Account\Infrastructure\Repository;

use Core\Common\Account\Domain\Repository\RepositoryInterface;
use Core\Common\Account\Domain\Entity\UserEntity;
use Core\Shared\Domain\ValueObject\User\UserId;
use Core\Shared\Infrastructure\Eloquent\User as UserEloquent;
use Illuminate\Cache\CacheManager;

final class CachedRepository implements RepositoryInterface
{
    private const TTL = 1440;

    public function __construct(
        private readonly EloquentRepository $eloquent,
        private readonly CacheManager $cache
    ) {}

    public function all(): array
    {
        return $this->cache->remember(
            key: 'users',
            ttl: self::TTL,
            callback: function() {
                return $this->eloquent->all();
            }
        );
    }

    public function find(UserId $id): UserEloquent
    {
        return $this->eloquent->find(id: $id);
    }

    public function save(UserEntity $entity): void
    {
        if ($this->cache->has('users')) {
            $this->cache->pull(key: 'users');
        }

        $this->eloquent->save(entity: $entity);
    }
    
    public function remove(UserId $id): void
    {
        if ($this->cache->has('users')) {
            $this->cache->forget(key: 'users');
        }

        $this->eloquent->remove(id: $id);
    }
}
