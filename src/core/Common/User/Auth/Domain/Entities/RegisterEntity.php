<?php declare(strict_types=1);

namespace Core\Common\User\Auth\Domain\Entities;

use Core\Common\User\Auth\Domain\ValueObjects\PasswordValueObject;
use Core\Common\User\Auth\Domain\ValueObjects\EmailValueObject;
use Core\Common\User\Auth\Domain\ValueObjects\EmailValueObject;

class RegisterEntity
{
    public function __construct(
        public readonly NameValueObject $firstName,
        public readonly EmailValueObject $email,
        public readonly PasswordValueObject $password
    ) {}

    public function toArray(): array
    {
        return [
            'first_name' => $this->firstName,
            'email' => $this->email,
            'password' => $this->password
        ];
    }
}
