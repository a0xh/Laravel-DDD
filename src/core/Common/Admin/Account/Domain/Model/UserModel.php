<?php declare(strict_types=1);

namespace Core\Common\Admin\Account\Domain\Model;

use Core\Common\Admin\Account\Domain\Entity\UserEntity;
use Core\Shared\Domain\ValueObject\User\UserId;

final class UserModel
{
    private array $model;

    public function __construct(array $collection = [])
    {
        $this->model = $collection;
    }

    public function find(UserId $uuid)
    {
        return $this->model[$uuid->asString()] ?? null;
    }

    public function all(): array
    {
        return $this->model;
    }

    public function save(UserEntity $entity): void
    {
        $this->model[$entity->getId()->asString()] = $entity;
    }

    public function delete(UserId $uuid): void
    {
        unset($this->model[$uuid->asString()]);
    }
}
