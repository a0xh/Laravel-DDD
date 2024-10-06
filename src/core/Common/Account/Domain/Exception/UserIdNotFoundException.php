<?php declare(strict_types=1);

namespace Core\Common\Account\Domain\Exception;

class UserIdNotFoundException extends \InvalidArgumentException
{
    public function __construct(string $userId)
    {
        parent::__construct(message: "User With ID '{$userId}' Not Found!");
    }
}