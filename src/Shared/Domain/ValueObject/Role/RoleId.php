<?php declare(strict_types=1);

namespace Core\Shared\Domain\ValueObject\Role;

use Core\Shared\Domain\Abstract\BaseUuid;

final class RoleId extends BaseUuid 
{
    public function jsonSerialize(): string
    {
        return $this->asString();
    }

    public function __toString(): string
    {
        return $this->asString();
    }
}
