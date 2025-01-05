<?php declare(strict_types=1);

namespace Core\Common\User\Presentation\Controller\Api\V1\Show;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Core\Common\Role\Domain\Entity\Role;

final class ShowUserResource extends JsonResource
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
            'first_name' => $this->getFristName(),
            'last_name' => $this->getLastName(),
            'patronymic' => $this->getPatronymic(),
            'phone' => $this->getPhone(),
            'email' => $this->getEmail(),
            'is_active' => $this->getIsActive(),
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
