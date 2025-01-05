<?php declare(strict_types=1);

namespace Core\Common\User\Application\Command;

use WendellAdriel\ValidatedDTO\SimpleDTO;
use WendellAdriel\ValidatedDTO\Concerns\EmptyCasts;
use WendellAdriel\ValidatedDTO\Casting\StringCast;
use WendellAdriel\ValidatedDTO\Casting\BooleanCast;
use WendellAdriel\ValidatedDTO\Attributes\Cast;
use Illuminate\Support\Facades\Hash;

class CreateUserCommand extends SimpleDTO
{
    use EmptyCasts;

    public public(set) string $firstName;
    public public(set) string $lastName;
    public public(set) string $patronymic;
    public public(set) string $phone;
    public public(set) string $email;
    public public(set) string $password;
    public public(set) bool $isActive;
    public public(set) string $roleId;

    protected function defaults(): array
    {
        return [
            'password' => Hash::make(
                value: $this->password
            ),
            'isActive' => true
        ];
    }

    protected function casts(): array
    {
        return [
            'firstName' => new StringCast(),
            'lastName' => new StringCast(),
            'patronymic' => new StringCast(),
            'phone' => new StringCast(),
            'email' => new StringCast(),
            'password' => new StringCast(),
            'isActive' => new BooleanCast(),
            'roleId' => new StringCast(),
        ];
    }

    protected function mapData(): array
    {
        return [
            'first_name' => 'firstName',
            'last_name' => 'lastName',
            'is_active' => 'isActive',
            'role_id' => 'roleId',
        ];
    }
}
