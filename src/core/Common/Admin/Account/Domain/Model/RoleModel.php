<?php declare(strict_types=1);

namespace Core\Common\Admin\Account\Domain\Model;

use Core\Common\Admin\Account\Domain\Entity\RoleEntity;
use Core\Shared\Domain\ValueObject\Role\RoleId;

final class RoleModel
{
    private array $model;

    public function __construct(array $collection = [])
    {
        $this->model = $collection;
    }

    public function save(RoleEntity $entity): void
    {
        $this->model[$entity->getId()->value()] = $entity;
    }

    public function find(RoleId $uuid)
    {
        return $this->model[$uuid->value()] ?? null;
    }

    public function all(): array
    {
        return $this->model;
    }

    public function delete(RoleId $uuid): void
    {
        unset($this->model[$uuid->value()]);
    }
}
