<?php declare(strict_types=1);

namespace Core\Common\Admin\Account\Domain\Factory;

use Core\Common\Admin\Account\Domain\Entity\UserEntity;

class UserFactory
{
    public static function create(array $collection): UserEntity
    {
        return new UserEntity(
            id: data_get(target: $collection, key: 'id'),
            avatar: data_get(target: $collection, key: 'avatar'),
            firstName: data_get(target: $collection, key: 'firstName'),
            lastName: data_get(target: $collection, key: 'lastName'),
            email: data_get(target: $collection, key: 'email'),
            status: data_get(target: $collection, key: 'status'),
            roles: data_get(target: $collection, key: 'roles'),
        );
    }
}
