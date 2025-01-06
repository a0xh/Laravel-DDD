<?php declare(strict_types=1);

namespace Core\Common\User\Application\Handler\Read;

use Core\Shared\Application\Query\BaseQuery;
use Core\Common\User\Domain\Repository\UserRepositoryInterface;
use Core\Common\User\Application\Query\GetAllUsersQuery;

final class GetAllUsersQueryHandler extends BaseQuery
{
    private private(set) UserRepositoryInterface $users;

    public function __construct(UserRepositoryInterface $users)
    {
        $this->users = $users;
    }

    public function handle(GetAllUsersQuery $query): array
    {
        return $this->users->all();
    }
}
