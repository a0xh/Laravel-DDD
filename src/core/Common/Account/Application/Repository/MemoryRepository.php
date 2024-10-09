<?php declare(strict_types=1);

namespace Core\Common\Account\Application\Repository;

use Core\Common\Account\Domain\Repository\RepositoryInterface;
use Core\Common\Account\Domain\Aggregate\AccountAggregate;
use Core\Common\Account\Domain\Entity\UserEntity;
use Core\Common\Account\Domain\Exception\UserIdNotFoundException;
use Core\Common\Account\Domain\Exception\UserSaveException;
use Core\Shared\Domain\ValueObject\User\UserId;

final class MemoryRepository implements RepositoryInterface
{
    private array $collection;

    public function __construct(array $collection = [])
    {
        $this->collection = $collection;
    }

    public function all(): array
    {
        return array_values(array: $this->collection);
    }

    public function find(UserId $id): ?UserEntity
    {
        return $this->collection[$id->asString()] ?? null;
    }

    public function save(AccountAggregate $aggregate): void
    {
        $userId = $aggregate->user()->getId()->asString();
        
        if (isset($this->collection[$userId])) {
            throw new UserSaveException(
                "User with ID {$userId} already exists."
            );
        }
        
        $this->collection[$userId] = $aggregate->user();
    }
    
    public function remove(UserId $id): void
    {
        if (!isset($this->collection[$id->asString()])) {
            throw new UserIdNotFoundException(userId: $userId);
        }

        unset($this->collection[$id->asString()]);
    }
}