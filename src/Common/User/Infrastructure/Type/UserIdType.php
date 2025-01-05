<?php declare(strict_types=1);

namespace Core\Common\User\Infrastructure\Type;

use Core\Common\User\Domain\ValueObject\UserId;
use Core\Shared\Infrastructure\Type\UuidType;

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
