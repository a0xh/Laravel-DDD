<?php declare(strict_types=1);

namespace Core\Common\Account\Infrastructure\Type;

use Core\Common\Account\Domain\ValueObject\RoleId;
use Core\Shared\Infrastructure\Type\UuidType;

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
