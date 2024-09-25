<?php declare(strict_types=1);

namespace Core\Common\Admin\Account\Domain\Factory;

use Core\Common\Admin\Account\Domain\Entity\RoleEntity;

class RoleFactory
{
    public static function new(array $entity): RoleEntity
    {
        return new RoleEntity(
            id: data_get(
                target: $entity, key: 'id'
            ),
            name: data_get(
                target: $entity, key: 'name'
            ),
            slug: data_get(
                target: $entity, key: 'slug'
            ),
        );
    }
}