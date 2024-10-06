<?php declare(strict_types=1);

namespace Core\Common\Account\Domain\Exception;

class UserNotFoundException extends \InvalidArgumentException
{
    public function __construct(string $message = 'User Not Found!')
    {
        parent::__construct(message: $message);
    }
}
