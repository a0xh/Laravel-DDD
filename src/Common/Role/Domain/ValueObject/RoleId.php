<?php declare(strict_types=1);

namespace Core\Common\Role\Domain\ValueObject;

use Core\Shared\Domain\ValueObject\BaseUuid;

final class RoleId extends BaseUuid
{
    public function jsonSerialize(): string
    {
        return $this->asString();
    }
}
