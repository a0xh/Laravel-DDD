<?php declare(strict_types=1);

namespace Core\Common\Account\Domain\Exception;

class RoleIdNotFoundException extends \InvalidArgumentException
{
    public function __construct(string $roleId)
    {
        parent::__construct(message: "Role With ID '{$roleId}' Not Found!");
    }
}
