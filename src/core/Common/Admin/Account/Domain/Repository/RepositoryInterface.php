<?php declare(strict_types=1);

namespace Core\Common\Admin\Account\Domain\Repository;

interface RepositoryInterface
{
    public function all();
    public function find(string $id);
    public function create(array $attributes);
    public function update(string $id, array $values);
    public function delete(string $id);
}
