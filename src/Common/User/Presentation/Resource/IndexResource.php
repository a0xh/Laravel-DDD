<?php declare(strict_types=1);

namespace Core\Common\User\Presentation\Resource;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Core\Shared\Domain\Entity\Role;

final class IndexResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->getId(),
            'first_name' => $this->getFirstName(),
            'last_name' => $this->getLastName(),
            'patronymic' => $this->getPatronymic(),
            'phone' => $this->getPhone(),
            'email' => $this->getEmail(),
            'email_verified_at' => $this->hasVerifiedEmail(),
            'is_active' => $this->getStatus(),
            'metadata' => [
                'created_at' => $this->getCreatedAt(),
                'updated_at' => $this->getUpdatedAt()
            ],
            'roles' => array_map(
                callback: function(Role $role): array {
                    return [
                        'id' => $role->getId(),
                        'name' => $role->getName(),
                        'slug' => $role->getSlug(),
                        'metadata' => [
                            'created_at' => $role->getCreatedAt(),
                            'updated_at' => $role->getUpdatedAt()
                        ],
                    ];
                },
                array: $this->getRoles()->toArray()
            )
        ];
    }
}
