<?php declare(strict_types=1);

namespace Core\Common\User\Application\Command;

use Core\Shared\Application\Command\Command;
use WendellAdriel\ValidatedDTO\Casting\StringCast;
use WendellAdriel\ValidatedDTO\Casting\BooleanCast;

final class UpdateCommand extends Command
{
    public public(set) string $id;
    public public(set) string $firstName;
    public public(set) string $lastName;
    public public(set) string $patronymic;
    public public(set) string $phone;
    public public(set) string $email;
    public public(set) string $password;
    public public(set) bool $status;
    public public(set) string $roleId;

    protected function defaults(): array
    {
        return ['status' => true];
    }

    public function casts(): array
    {
        return [
            'id' => new StringCast(),
            'firstName' => new StringCast(),
            'lastName' => new StringCast(),
            'patronymic' => new StringCast(),
            'phone' => new StringCast(),
            'email' => new StringCast(),
            'password' => new StringCast(),
            'status' => new BooleanCast(),
            'roleId' => new StringCast(),
        ];
    }

    protected function mapData(): array
    {
        return [
            'first_name' => 'firstName',
            'last_name' => 'lastName',
            'is_active' => 'status',
            'role_id' => 'roleId',
        ];
    }
}
