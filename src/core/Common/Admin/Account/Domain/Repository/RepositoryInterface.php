<?php declare(strict_types=1);

namespace Core\Common\Admin\Account\Domain\Repository;

interface RepositoryInterface
{
    public function all();
    public function find(string $id);
    public function paginate();
    public function create(array $attributes): bool;
    public function update(string $id, array $values): bool;
    public function delete(string $id): bool;
}
