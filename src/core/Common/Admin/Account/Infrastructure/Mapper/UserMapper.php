<?php declare(strict_types=1);

namespace Core\Common\Admin\Account\Infrastructure\Mapper;

use Core\Common\Admin\Account\Domain\Entity\UserEntity;
use Core\Common\Admin\Account\Domain\Entity\RoleEntity;
use Core\Common\Admin\Account\Domain\Factory\UserFactory;
use Core\Shared\Infrastructure\Eloquent\User as UserEloquent;
use Core\Shared\Domain\ValueObject\User\UserId;
use Core\Shared\Domain\ValueObject\User\Avatar;
use Core\Shared\Domain\ValueObject\User\FirstName;
use Core\Shared\Domain\ValueObject\User\LastName;
use Core\Shared\Domain\ValueObject\User\Email;
use Core\Shared\Domain\ValueObject\User\Password;
use Core\Shared\Domain\ValueObject\User\Status;

final class UserMapper
{
    public static function fromEloquent(UserEloquent $eloquent): UserEntity
    {
        return UserFactory::create(data: [
    		'id' => new UserId(value: $eloquent->id),
    		'avatar' => new Avatar(value: $eloquent->avatar),
    		'firstName' => new FirstName(value: $eloquent->first_name),
    		'lastName' => new LastName(value: $eloquent->last_name),
    		'email' => new Email(value: $eloquent->email),
            'password' => new Password(value: $eloquent->password),
    		'status' => new Status(value: $eloquent->status),
    	]);
    }

    public static function fromRequest(Request $request): UpdateUserCommand
    {
        return UserFactory::create(data: [
            'id' => $request->id,
            'avatar' => $request->avatar,
            'firstName' => $request->firstName,
            'lastName' => $request->lastName,
            'email' => $request->email,
            'status' => $request->status,
            'roles' => $request->roles
        ]);
    }
}
