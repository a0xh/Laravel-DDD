<?php declare(strict_types=1);

namespace Core\Common\Admin\Account\Application\Service;

use Core\Common\Admin\Account\Domain\Repository\RepositoryInterface;
use Core\Common\Admin\Account\Domain\Contract\AggregateRoot;
use Core\Common\Admin\Account\Infrastructure\Mapper\{UserMapper, RoleMapper};
use Core\Shared\Infrastructure\Eloquent\User as UserEloquent;

final class CollectionUserService
{
    public function __construct(
        private readonly RepositoryInterface $repository,
        private readonly AggregateRoot $aggregate
    ) {}

    public function all(): array
    {
        $this->repository->all()->each(
            callback: function (UserEloquent $query): void {
                $this->aggregate->add(
                    user: $user = UserMapper::fromEloquent(
                        eloquent: $query
                    ),
                    role: $role = RoleMapper::fromCollection(
                        eloquent: $query->roles
                    )
                );

                $this->aggregate->with(
                    user: $user, id: $role->getId()
                );
            }
        );

        dd($this->aggregate->get());
    }
}
