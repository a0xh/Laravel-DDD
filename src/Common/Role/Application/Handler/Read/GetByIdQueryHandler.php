<?php declare(strict_types=1);

namespace Core\Common\Role\Application\Handler\Read;

use Core\Shared\Application\Query\BaseQuery;
use Core\Common\Role\Domain\Repository\RoleRepositoryInterface;
use Core\Common\Role\Application\Query\GetByIdQuery;
use Core\Common\Role\Domain\Entity\Role;

final class GetByIdQueryHandler extends BaseQuery
{
    private readonly private(set) RoleRepositoryInterface $role;

    public function __construct(RoleRepositoryInterface $role)
    {
        $this->role = $role;
    }

    public function handle(GetByIdQuery $query): ?Role
    {
        return $this->role->findById(id: $query->getId());
    }
}
