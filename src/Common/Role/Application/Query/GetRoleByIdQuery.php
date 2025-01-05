<?php declare(strict_types=1);

namespace Core\Common\Role\Application\Query;

use Core\Common\Role\Domain\ValueObject\RoleId;

final class GetRoleByIdQuery
{
    private readonly private(set) string $roleId;

    public function __construct(string $roleId)
    {
        $this->roleId = $roleId;
    }

    public function getId(): RoleId
    {
        return RoleId::fromString(id: $this->roleId);
    }
}
