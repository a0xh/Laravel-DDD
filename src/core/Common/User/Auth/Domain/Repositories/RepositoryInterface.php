<?php declare(strict_types=1);

namespace Core\Common\User\Auth\Domain\Repositories;

interface RepositoryInterface
{
    public function create(array $collection): bool;
}
