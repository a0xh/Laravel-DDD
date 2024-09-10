<?php declare(strict_types=1);

namespace Core\Common\User\Auth\Domain\Factories;

use Core\Common\User\Auth\Domain\Entities\RegisterEntity;

class RegisterFactory
{
    public static function create(array $data): RegisterEntity
    {
        return new RegisterEntity(
            firstName: $data['first_name'],
            email: $data['email'],
            password: $data['password']
        );
    }
}
