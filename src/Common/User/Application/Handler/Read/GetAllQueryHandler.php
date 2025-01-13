<?php declare(strict_types=1);

namespace Core\Common\User\Application\Handler\Read;

use Core\Shared\Application\Query\Query;
use Core\Shared\Domain\Repository\UserRepositoryInterface;
use Core\Common\User\Application\Query\GetAllQuery;

final class GetAllQueryHandler extends Query
{
    private readonly private(set) UserRepositoryInterface $users;

    public function __construct(UserRepositoryInterface $users)
    {
        $this->users = $users;
    }

    public function handle(GetAllQuery $query): array
    {
        return $this->users->all();
    }
}
