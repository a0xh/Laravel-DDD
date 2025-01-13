<?php declare(strict_types=1);

namespace Core\Common\User\Infrastructure\Type;

use Core\Shared\Infrastructure\Type\UuidType;
use Core\Shared\Domain\ValueObject\User\UserId;

final class UserIdType extends UuidType
{
    public const NAME = 'user_id';

    public function getValueObjectClass(): string
    {
        return UserId::class;
    }

    public function getName(): string
    {
        return self::NAME;
    }
}
