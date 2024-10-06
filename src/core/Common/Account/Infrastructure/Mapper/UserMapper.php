<?php declare(strict_types=1);

namespace Core\Common\Account\Infrastructure\Mapper;

use Core\Shared\Infrastructure\Eloquent\User as UserEloquent;

final readonly class UserMapper
{
    public function toArray(UserEloquent $eloquent): array
    {
        return [
            'id' => $eloquent->id,
            'avatar' => $eloquent->avatar,
            'first_name' => $eloquent->first_name,
            'last_name' => $eloquent->last_name,
            'email' => $eloquent->email,
            'password' => $eloquent->password ?? null,
            'status' => $eloquent->status,
            'created_at' => $eloquent->created_at,
            'updated_at' => $eloquent->updated_at
        ];
    }
}
