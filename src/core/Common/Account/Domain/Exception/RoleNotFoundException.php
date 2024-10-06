<?php declare(strict_types=1);

namespace Core\Common\Account\Domain\Exception;

class RoleNotFoundException extends \InvalidArgumentException
{
    public function __construct(string $message = 'Role Not Found!')
    {
        parent::__construct(message: $message);
    }
}
