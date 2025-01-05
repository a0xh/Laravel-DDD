<?php declare(strict_types=1);

namespace Core\Common\Role\Application\Handler\Read;

use Core\Shared\Application\Query\BaseQuery;
use Core\Common\Role\Domain\Repository\RoleRepositoryInterface;
use Core\Common\Role\Application\Query\GetRoleByIdQuery;
use Core\Common\Role\Domain\Entity\Role;

final class GetRoleByIdQueryHandler extends BaseQuery
{
    private private(set) RoleRepositoryInterface $role;

    public function __construct(RoleRepositoryInterface $role)
    {
        $this->role = $role;
    }

    public function handle(GetRoleByIdQuery $query): ?Role
    {
        return $this->role->findById(id: $query->getId());
    }
}
