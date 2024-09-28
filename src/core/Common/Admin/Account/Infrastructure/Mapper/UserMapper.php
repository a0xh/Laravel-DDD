<?php declare(strict_types=1);

namespace Core\Common\Admin\Account\Infrastructure\Mapper;

use Core\Common\Admin\Account\Domain\Entity\UserEntity;
use Core\Shared\Domain\ValueObject\User\UserId;
use Core\Shared\Domain\ValueObject\User\Avatar;
use Core\Shared\Domain\ValueObject\User\FirstName;
use Core\Shared\Domain\ValueObject\User\LastName;
use Core\Shared\Domain\ValueObject\User\Email;
use Core\Shared\Domain\ValueObject\User\Status;
use Core\Common\Admin\Account\Domain\Factory\UserFactory;
use Core\Shared\Infrastructure\Eloquent\User as UserEloquent;
use Illuminate\Pagination\LengthAwarePaginator;

final readonly class UserMapper
{
    public static function fromEloquent(UserEloquent $user): UserEntity
    {
        return UserFactory::create(collection: [
            'id' => new UserId(value: $user->id),
            'avatar' => new Avatar(value: $user->avatar),
            'firstName' => new FirstName(value: $user->first_name),
            'lastName' => new LastName(value: $user->last_name),
            'email' => new Email(value: $user->email),
            'status' => new Status(value: $user->status),
            'roles' => RoleMapper::fromEloquent(
                roles: $user->roles
            ),
        ]);
    }
}
