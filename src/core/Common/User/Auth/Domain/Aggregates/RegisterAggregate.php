<?php declare(strict_types=1);

namespace Core\Common\User\Auth\Domain\Aggregates;

use Core\Common\User\Auth\Domain\Entities\RegisterEntity;

class RegisterAggregate
{
    public function __construct(
        protected readonly RegisterEntity $entity
    ) {}

    public function toArray(): array
    {
        return [
            'first_name' => $this->entity->firstName,
            'email' => $this->entity->email,
            'password' => $this->entity->password
        ];
    }
}
