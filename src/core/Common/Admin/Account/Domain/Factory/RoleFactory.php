<?php declare(strict_types=1);

namespace Core\Common\Admin\Account\Domain\Factory;

use Core\Common\Admin\Account\Domain\Entity\RoleEntity;

class RoleFactory
{
    public static function create(array $collection): RoleEntity
    {
        return new RoleEntity(
            id: data_get(target: $collection, key: 'id'),
            name: data_get(target: $collection, key: 'name'),
            slug: data_get(target: $collection, key: 'slug'),
        );
    }
}
