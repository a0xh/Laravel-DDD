<?php declare(strict_types=1);

namespace Core\Common\User\Application\Handler\Read;

use Core\Shared\Application\Query\BaseQuery;
use Core\Common\User\Domain\Repository\UserRepositoryInterface;
use Core\Common\User\Application\Query\GetUserByIdQuery;
use Core\Common\User\Domain\Entity\User;

final class GetUserByIdQueryHandler extends BaseQuery
{
    private private(set) UserRepositoryInterface $user;

    public function __construct(UserRepositoryInterface $user)
    {
        $this->user = $user;
    }

    public function handle(GetUserByIdQuery $query): ?User
    {
        return $this->user->findById(id: $query->getId());
    }
}
