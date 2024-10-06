<?php declare(strict_types=1);

namespace Core\Common\Account\Domain\Exception;

class UserSaveException extends \DomainException
{
    public function __construct(string $message = 'Failed To Save User!')
    {
        parent::__construct(message: $message);
    }
}