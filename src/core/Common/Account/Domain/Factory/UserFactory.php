<?php declare(strict_types=1);

namespace Core\Common\Account\Domain\Factory;

use Core\Shared\Domain\ValueObject\User\UserId;
use Core\Shared\Domain\ValueObject\User\Avatar;
use Core\Shared\Domain\ValueObject\User\FirstName;
use Core\Shared\Domain\ValueObject\User\LastName;
use Core\Shared\Domain\ValueObject\User\Email;
use Core\Shared\Domain\ValueObject\User\Password;
use Core\Shared\Domain\ValueObject\User\Status;
use Core\Shared\Domain\ValueObject\User\Timestamp;
use Core\Shared\Domain\Factory\FactoryInterface;
use Core\Common\Account\Domain\Entity\UserEntity;

final readonly class UserFactory implements FactoryInterface
{
    public static function create(array $attributes): UserEntity
    {
        self::validateData(arguments: $attributes);

        return new UserEntity(
            id: self::createUserId(string: $attributes['id']),
            avatar: self::createAvatar(string: $attributes['avatar']),
            firstName: self::createFirstName(string: $attributes['first_name']),
            lastName: self::createLastName(string: $attributes['last_name']),
            email: self::createEmail(string: $attributes['email']),
            password: self::createPassword(string: $attributes['password']),
            status: self::createStatus(boolean: $attributes['status']),
            createdAt: self::createTimestamp(string: $attributes['created_at']),
            updatedAt: self::createTimestamp(string: $attributes['updated_at'])
        );
    }

    private static function validateData(array $arguments): void
    {
        if (!filled(value: data_get(target: $arguments, key: 'id'))) {
            throw new \InvalidArgumentException(message: 'User ID Is Required!');
        }

        if (!filled(value: data_get(target: $arguments, key: 'first_name'))) {
            throw new \InvalidArgumentException(message: 'First Name Is Required!');
        }

        if (!filled(value: data_get(target: $arguments, key: 'email'))) {
            throw new \InvalidArgumentException(message: 'Email Is Required!');
        }

        if (!filled(value: data_get(target: $arguments, key: 'status'))) {
            throw new \InvalidArgumentException(status: 'Status Is Required.');
        }
    }

    private static function createUserId(string $string): UserId
    {
        return UserId::fromString(value: $string);
    }

    private static function createAvatar(?string $string): ?Avatar
    {
        return Avatar::fromNullableString(value: $string);
    }

    private static function createFirstName(string $string): FirstName
    {
        return FirstName::fromString(value: $string);
    }

    private static function createLastName(?string $string): ?LastName
    {
        return LastName::fromNullableString(value: $string);
    }

    private static function createEmail(string $string): Email
    {
        return Email::fromString(value: $string);
    }

    private static function createPassword(?string $string): ?Password
    {
        return Password::fromNullableString(value: $string);
    }

    private static function createStatus(bool $boolean): Status
    {
        return Status::fromBoolean(value: $boolean);
    }
    
    private static function createTimestamp(?string $string): ?Timestamp
    {
        return Timestamp::fromNullableString(value: $string);
    }
}