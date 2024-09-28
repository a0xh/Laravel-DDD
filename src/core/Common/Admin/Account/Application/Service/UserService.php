<?php declare(strict_types=1);

namespace Core\Common\Admin\Account\Application\Service;

use Core\Common\Admin\Account\Domain\Repository\RepositoryInterface;
use Core\Common\Admin\Account\Domain\Model\UserModel;
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
        private readonly UserModel $model
    ) {}

    public function paginate(): LengthAwarePaginator
    {
        foreach ($this->repository->all() as $eloquent) {
            $this->model->save(
                entity: UserMapper::fromEloquent(
                    user: $eloquent
                )
            );
        }

        return new Paginator(
            collection: $this->model->all()
        );
    }

    public function find(UserId $id): UserEntity
    {
        $user = $this->repository->find(id: $id->value());

        $this->model->save(
            entity: UserMapper::fromEloquent(
                user: $user
            )
        );

        return $this->model->find(uuid: $id);
    }
}