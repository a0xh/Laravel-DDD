<?php declare(strict_types=1);

namespace Core\Common\Account\Domain\Factory;

use Core\Common\Account\Domain\Entity\RoleEntity;
use Core\Shared\Domain\ValueObject\Role\RoleId;
use Core\Shared\Domain\ValueObject\Role\Name;
use Core\Shared\Domain\ValueObject\Role\Description;
use Core\Shared\Domain\ValueObject\Role\Slug;
use Core\Shared\Domain\ValueObject\Role\Timestamp;
use Core\Shared\Domain\Factory\FactoryInterface;

final readonly class RoleFactory implements FactoryInterface
{
    public static function create(array $attributes): RoleEntity
    {
        self::validateData(arguments: $attributes);

        return new RoleEntity(
            id: self::createRoleId(string: $attributes['id']),
            name: self::createName(string: $attributes['name']),
            description: self::createDescription(string: $attributes['description']),
            slug: self::createSlug(string: $attributes['slug']),
            createdAt: self::createTimestamp(string: $attributes['created_at']),
            updatedAt: self::createTimestamp(string: $attributes['updated_at'])
        );
    }

    private static function validateData(array $arguments): void
    {
        if (!filled(value: data_get(target: $arguments, key: 'id'))) {
            throw new \InvalidArgumentException(message: 'User ID Is Required!');
        }

        if (!filled(value: data_get(target: $arguments, key: 'name'))) {
            throw new \InvalidArgumentException(message: 'Name Is Required!');
        }

        if (!filled(value: data_get(target: $arguments, key: 'slug'))) {
            throw new \InvalidArgumentException(message: 'Slug Is Required!');
        }
    }

    private static function createRoleId(string $string): RoleId
    {
        return RoleId::fromString(value: $string);
    }

    private static function createName(string $string): Name
    {
        return Name::fromString(value: $string);
    }

    private static function createDescription(string $string): Description
    {
        return Description::fromNullableString(value: $string);
    }

    private static function createSlug(string $string): Slug
    {
        return Slug::fromString(value: $string);
    }
    
    private static function createTimestamp(string $string): Timestamp
    {
        return Timestamp::fromString(value: $string);
    }
}