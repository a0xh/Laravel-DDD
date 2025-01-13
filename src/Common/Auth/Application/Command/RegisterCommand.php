<?php declare(strict_types=1);

namespace Core\Common\Auth\Application\Command;

use Core\Shared\Application\Command\Command;
use WendellAdriel\ValidatedDTO\Casting\StringCast;

final class RegisterCommand extends Command
{
    public public(set) string $firstName;
    public public(set) string $lastName;
    public public(set) string $email;
    public public(set) string $password;

    protected function defaults(): array
    {
        return ['status' => true];
    }

    public function casts(): array
    {
        return [
            'firstName' => new StringCast(),
            'lastName' => new StringCast(),
            'email' => new StringCast(),
            'password' => new StringCast(),
        ];
    }

    protected function mapData(): array
    {
        return [
            'first_name' => 'firstName',
            'last_name' => 'lastName',
        ];
    }
}
