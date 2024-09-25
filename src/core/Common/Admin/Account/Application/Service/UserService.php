<?php declare(strict_types=1);

namespace Core\Common\Admin\Account\Application\Service;

use Core\Common\Admin\Account\Domain\Repository\RepositoryInterface;
use Core\Common\Admin\Account\Domain\Contract\AggregateRoot;
use Core\Shared\Domain\ValueObject\User\UserId;
use Core\Common\Admin\Account\Infrastructure\Mapper\UserMapper;
use Core\Shared\Infrastructure\Eloquent\User as UserEloquent;
use Core\Shared\Infrastructure\Illuminate\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use Core\Common\Admin\Account\Domain\Entity\UserEntity;

final class UserService
{
    public function __construct(
        private readonly RepositoryInterface $repository,
        private readonly AggregateRoot $aggregate
    ) {}

    public function all(): LengthAwarePaginator
    {
        foreach ($this->repository->all() as $eloquent) {
            $this->aggregate->user()->save(
                entity: UserMapper::fromEloquent(
                    query: $eloquent
                )
            );
        }

        return new Paginator(
            collection: $this->aggregate->user()->all()
        );
    }

    public function find(UserId $id): UserEntity
    {
        $user = $this->repository->find(id: $id->value());

        $this->aggregate->user()->save(
            entity: UserMapper::fromEloquent(
                query: $user
            )
        );

        return $this->aggregate->user()->find(uuid: $id);
    }
}