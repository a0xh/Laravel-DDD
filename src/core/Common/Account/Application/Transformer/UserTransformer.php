<?php

namespace Core\Common\Account\Application\Transformer;

use Core\Common\Account\Domain\Entity\UserEntity;
use Core\Common\Account\Domain\Entity\RoleEntity;

class UserTransformer
{
    public function toArray(UserEntity $user): array
    {
        return [
            'id' => $user->getId()->asString(),
            'avatar' => $user->getAvatar()->value(),
            'first_name' => $user->getFirstName()->value(),
            'last_name' => $user->getLastName()->value(),
            'email' => $user->getEmail()->value(),
            'status' => $user->getStatus()->value(),
            'created_at' => $user->getCreatedAt()->value(),
            'updated_at' => $user->getUpdatedAt()->value(),
            'roles' => array_map(function(RoleEntity $role): array {
                return [
                	'id' => $role->getId()->asString(),
                	'name' => $role->getName()->value(),
                	'description' => $role->getDescription()->value(),
                	'slug' => $role->getSlug()->value(),
		            'created_at' => $role->getCreatedAt()->value(),
		            'updated_at' => $role->getUpdatedAt()->value(),
                ];
            }, $user->getRoles())
        ];
    }

    public function fromArray(array $data) {
        return array_map([$this, 'toArray'], $data);
    }
}