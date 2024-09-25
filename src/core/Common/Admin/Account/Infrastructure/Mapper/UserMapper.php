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

final class UserMapper
{
    public static function fromEloquent(UserEloquent $query): UserEntity
    {
        return UserFactory::create(collection: [
            'id' => new UserId(value: $query->id),
            'avatar' => new Avatar(value: $query->avatar),
            'firstName' => new FirstName(value: $query->first_name),
            'lastName' => new LastName(value: $query->last_name),
            'email' => new Email(value: $query->email),
            'status' => new Status(value: $query->status),
            'roles' => RoleMapper::fromCollection(
                eloquent: $query->roles
            ),
        ]);
    }
}
