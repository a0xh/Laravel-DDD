<?php declare(strict_types=1);

namespace Core\Common\Account\Application\Repository;

use Core\Common\Account\Domain\Entity\UserEntity;
use Core\Common\Account\Infrastructure\Repository\EloquentRepository;
use Core\Common\Account\Domain\Exception\UserIdNotFoundException;
use Core\Common\Account\Domain\Exception\UserSaveException;
use Core\Shared\Domain\ValueObject\User\UserId;
use Core\Shared\Infrastructure\Illuminate\Paginator;
use Core\Common\Account\Domain\Aggregate\AccountAggregate;
use Illuminate\Pagination\LengthAwarePaginator;

final class EntityRepository extends DecoratorRepository
{
    public function __construct(EloquentRepository $eloquent)
    {
        parent::__construct(repository: $eloquent);
    }

    public function all(): array
    {
        return $this->collection->all();
    }

    public function paginate(int $perPage): LengthAwarePaginator
    {
        return new Paginator(
            items: $this->collection->all(),
            perPage: $perPage
        );
    }

    public function find(UserId $id): ?UserEntity
    {
        $user = $this->collection->find(id: $id);
        
        if ($user === null) {
            throw new UserIdNotFoundException(userId: $id->asString());
        }
        
        return $user;
    }

    public function save(AccountAggregate $aggregate): void
    {
        if (!$this->repository->save(aggregate: $aggregate)) {
            throw new UserSaveException(message: 'Failed To Save Account Aggregate!');
        }
        
        $this->collection->save(aggregate: $aggregate);
    }

    public function remove(UserId $id): void
    {
        if (!$this->repository->remove(id: $id)) {
            throw new UserIdNotFoundException(userId: $id->asString());
        }
        
        $this->collection->remove(id: $id);
    }
}
