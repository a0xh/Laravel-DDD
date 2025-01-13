<?php declare(strict_types=1);

namespace Core\Common\User\Application\Handler\Read;

use Core\Shared\Application\Query\Query;
use Core\Shared\Domain\Repository\UserRepositoryInterface;
use Core\Common\User\Application\Query\GetByIdQuery;
use Core\Shared\Domain\Entity\User;

final class GetByIdQueryHandler extends Query
{
    private private(set) UserRepositoryInterface $user;

    public function __construct(UserRepositoryInterface $user)
    {
        $this->user = $user;
    }

    public function handle(GetByIdQuery $query): ?User
    {
        return $this->user->findById(id: $query->getId());
    }
}
