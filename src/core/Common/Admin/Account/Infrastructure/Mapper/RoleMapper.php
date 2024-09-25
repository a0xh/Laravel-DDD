<?php declare(strict_types=1);

namespace Core\Common\Admin\Account\Infrastructure\Mapper;

use Core\Common\Admin\Account\Domain\Entity\RoleEntity;
use Core\Shared\Domain\ValueObject\Role\{RoleId, Name, Slug};
use Core\Common\Admin\Account\Domain\Factory\RoleFactory;
use Illuminate\Database\Eloquent\Collection;

final class RoleMapper
{
    public static function fromCollection(Collection $eloquent): array
    {
        $data = [];

        foreach ($eloquent as $role) {
            $data[$role->id] = RoleFactory::create(collection: [
                'id' => new RoleId(value: $role->id),
                'name' => new Name(value: $role->name),
                'slug' => new Slug(value: $role->slug),
            ]);
        }

        return $data;
    }
}
