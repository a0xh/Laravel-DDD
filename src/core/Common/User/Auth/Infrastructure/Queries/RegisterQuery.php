<?php declare(strict_types=1);

namespace Core\Common\User\Auth\Infrastructure\Queries;

use Core\Common\User\Auth\Domain\Repositories\RepositoryInterface;

final class RegisterQuery
{
    public function __construct(
        private readonly RepositoryInterface $repository
    ) {}

    public function handle(array $data): bool
    {
        return $this->repository->create(
            collection: $data
        );
    }
}
