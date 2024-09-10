<?php declare(strict_types=1);

namespace Core\Common\User\Auth\Application\Commands;

class RegisterCommand
{
    public function __construct(
        public readonly string $firstName,
        public readonly string $email,
        public readonly string $password
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

