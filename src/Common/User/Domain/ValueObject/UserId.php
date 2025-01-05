<?php declare(strict_types=1);

namespace Core\Common\User\Domain\ValueObject;

use Core\Shared\Domain\ValueObject\BaseUuid;

final class UserId extends BaseUuid 
{
    public function jsonSerialize(): string
    {
        return $this->asString();
    }
}
