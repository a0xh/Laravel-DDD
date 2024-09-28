<?php declare(strict_types=1);

namespace Core\Common\Admin\Account\Domain\Factory;

use Core\Common\Admin\Account\Domain\Entity\RoleEntity;

final readonly class RoleFactory
{
    public static function create(array $data): RoleEntity
    {
        try {
            return new RoleEntity(
                uuid: data_get(target: $data, key: 'uuid'),
                name: data_get(target: $data, key: 'name'),
                slug: data_get(target: $data, key: 'slug'),
            );
        }

        catch (\InvalidArgumentException $exception) {
            return $exception->getMessage();
        }
    }
}
