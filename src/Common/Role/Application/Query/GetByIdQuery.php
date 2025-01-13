<?php declare(strict_types=1);

namespace Core\Common\Role\Application\Query;

use Core\Shared\Domain\ValueObject\Role\RoleId;

final class GetByIdQuery
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
