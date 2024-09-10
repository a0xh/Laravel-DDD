<?php declare(strict_types=1);

namespace Core\Common\User\Auth\Infrastructure\Repositories;

use Core\Common\User\Auth\Domain\Entities\RegisterEntity;
use Core\Common\User\Auth\Domain\Repositories\RepositoryInterface;
use Core\Shared\Infrastructure\Models\{UserModel, RoleModel};

final class RegisterRepository implements RepositoryInterface
{
    public function __construct(
        private readonly UserModel $user,
        private readonly RoleModel $role
    ) {}

    public function create(RegisterEntity $entity): bool
    {
        return $this->user->query()->create(
            attributes: $entity->toArray()
        )->sync(
            ids: $this->role->query()->where(
                column: 'slug',
                operator: '=',
                value: 'user'
            )->firstOrFail(
                columns: ['id']
            )->id
        )->saveOrFail(
            options: []
        );
    }
}
