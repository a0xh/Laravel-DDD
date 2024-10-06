<?php declare(strict_types=1);

namespace Core\Common\Account\Domain\Exception;

class RoleAlreadyExistsException extends \InvalidArgumentException
{
    public function __construct(string $roleId)
    {
        parent::__construct(message: "Role with ID '{$roleId}' already exists!");
    }
}
