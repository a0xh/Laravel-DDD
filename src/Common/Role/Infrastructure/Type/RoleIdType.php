<?php declare(strict_types=1);

namespace Core\Common\Role\Infrastructure\Type;

use Core\Shared\Infrastructure\Type\UuidType;
use Core\Common\Role\Domain\ValueObject\RoleId;

final class RoleIdType extends UuidType
{
    public const NAME = 'role_id';

    public function getValueObjectClass(): string
    {
        return RoleId::class;
    }

    public function getName(): string
    {
        return self::NAME;
    }
}
