<?php declare(strict_types=1);

namespace Core\Common\Account\Domain\Exception;

class RoleValidationException extends \InvalidArgumentException
{
    public function __construct(string $message)
    {
        parent::__construct(message: $message);
    }
}
