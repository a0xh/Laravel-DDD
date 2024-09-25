<?php declare(strict_types=1);

namespace Core\Common\Admin\Account\Domain\Factory;

use Core\Common\Admin\Account\Domain\Entity\UserEntity;

class UserFactory
{
    public static function create(array $data): UserEntity
    {
        return new UserEntity(
            id: data_get(
                target: $data, key: 'id'
            ),
            avatar: data_get(
                target: $data, key: 'avatar'
            ),
            firstName: data_get(
                target: $data, key: 'firstName'
            ),
            lastName: data_get(
                target: $data, key: 'lastName'
            ),
            email: data_get(
                target: $data, key: 'email'
            ),
            password: data_get(
                target: $data, key: 'password'
            ),
            status: data_get(
                target: $data, key: 'status'
            ),
            roles: data_get(
                target: $data, key: 'roles'
            ),
        );
    }
}