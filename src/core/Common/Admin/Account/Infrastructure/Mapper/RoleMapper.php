<?php declare(strict_types=1);

namespace Core\Common\Admin\Account\Infrastructure\Mapper;

use Core\Common\Admin\Account\Domain\ValueObject\Role\Uuid;
use Core\Common\Admin\Account\Domain\ValueObject\Role\Name;
use Core\Common\Admin\Account\Domain\ValueObject\Role\Slug;
use Core\Common\Admin\Account\Domain\Factory\RoleFactory;
use Illuminate\Database\Eloquent\Collection;

final readonly class RoleMapper
{
    public static function fromEloquent(Collection $roles): array
    {
        $collection = [];

        foreach ($roles as $role) {
            $collection[$role->id] = RoleFactory::create(
                data: [
                    'uuid' => new Uuid(value: $role->id),
                    'name' => Name::fromString(value: $role->name),
                    'slug' => Slug::fromString(value: $role->slug)
                ]
            );
        }

        return $collection;
    }
}
