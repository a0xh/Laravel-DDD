<?php declare(strict_types=1);

namespace Core\Common\User\Auth\Application\Handlers;

use Core\Common\User\Auth\Domain\Repositories\RepositoryInterface;
use Core\Common\User\Auth\Application\Commands\RegisterCommand;

class RegisterHandler
{
    public function __construct(
        private readonly RepositoryInterface $repository
    ) {}

    public function handle(RegisterCommand $command): bool
    {
        return $this->repository->create(
            entity: $command->toArray()
        );
    }
}
