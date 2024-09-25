<?php declare(strict_types=1);

namespace Core\Common\Admin\Account\Infrastructure\Repository;

use Core\Common\Admin\Account\Domain\Repository\RepositoryInterface;
use Core\Shared\Infrastructure\Eloquent\User as UserEloquent;
use Illuminate\Database\Eloquent\Collection;

final class EloquentUserRepository implements RepositoryInterface
{
    public function __construct(
        private readonly UserEloquent $eloquent
    ) {}

    public function all(): array
    {
        return $this->eloquent->query()->withOnly(
            relations: 'roles'
        )->orderBy(
            column: 'created_at',
            direction: 'desc'
        )->get(
            columns: [
                'id',
                'avatar',
                'first_name',
                'last_name',
                'email',
                'created_at',
                'updated_at',
                'status',
            ]
        )->all();
    }

    public function find(string $id): UserEloquent
    {
        return $this->eloquent->query()->withOnly(
            relations: 'roles'
        )->findOrFail(
            id: $id,
            columns: [
                'id',
                'avatar',
                'first_name',
                'last_name',
                'email',
                'created_at',
                'updated_at',
                'status',
            ]
        );
    }

    public function create(array $attributes): bool
    {
        return $this->eloquent->query()->create(
            attributes: $attributes
        );
    }

    public function update(string $id, array $values): bool
    {
        return $this->eloquent->query()->where(
            column: 'id',
            operator: '=',
            value: $id
        )->update(
            values: $values
        );
    }

    public function delete(string $id): bool
    {
        return $this->eloquent->query()->where(
            column: 'id',
            operator: '=',
            value: $id
        )->delete();
    }
}