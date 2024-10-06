<?php declare(strict_types=1);

namespace Core\Common\Account\Infrastructure\Mapper;

final readonly class RoleMapper
{
    public function toArray($eloquent): array
    {
        return [
            'id' => $eloquent->id,
            'name' => $eloquent->name,
            'description' => $eloquent->description,
            'slug' => $eloquent->slug,
            'created_at' => $eloquent->created_at,
            'updated_at' => $eloquent->updated_at,
        ];
    }
}
