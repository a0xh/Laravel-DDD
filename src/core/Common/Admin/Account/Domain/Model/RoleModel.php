<?php declare(strict_types=1);

namespace Core\Common\Admin\Account\Domain\Model;

use Core\Common\Admin\Account\Domain\Entity\RoleEntity;
use Core\Common\Admin\Account\Domain\ValueObject\Role\Uuid;

final class RoleModel
{
    private array $model;

    public function __construct(array $data = [])
    {
        $this->model = $data;
    }

    public function save(RoleEntity $entity): void
    {
        $this->model[$entity->getUuid()] = $entity;
    }

    public function find(Uuid $uuid)
    {
        return $this->model[$uuid->value()] ?? null;
    }

    public function all(): array
    {
        return $this->model;
    }

    public function delete(Uuid $uuid): void
    {
        unset($this->model[$uuid->value()]);
    }
}
