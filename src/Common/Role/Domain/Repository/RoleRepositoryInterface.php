<?php declare(strict_types=1);

namespace Core\Common\Role\Domain\Repository;

use Core\Common\Role\Domain\Entity\Role;

interface RoleRepositoryInterface
{
	public function save(Role $user): void;
	public function delete(Role $user): void;
}
