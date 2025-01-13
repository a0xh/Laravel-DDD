<?php declare(strict_types=1);

namespace Core\Common\Role\Domain\Repository;

use Core\Shared\Domain\Repository\RoleRepositoryInterface;
use Core\Shared\Domain\Entity\Role;

interface RepositoryInterface extends RoleRepositoryInterface
{
	public function save(Role $user): void;
	public function delete(Role $user): void;
}
