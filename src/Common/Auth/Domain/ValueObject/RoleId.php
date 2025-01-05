<?php declare(strict_types=1);

namespace Core\Common\Account\Domain\ValueObject;

use Core\Shared\Domain\ValueObject\UuidValueObject;

final class RoleId extends UuidValueObject
{
	public function jsonSerialize(): string
    {
        return $this->asString();
    }
}
