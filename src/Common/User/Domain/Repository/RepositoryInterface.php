<?php declare(strict_types=1);

namespace Core\Common\User\Domain\Repository;

use Core\Shared\Domain\Repository\UserRepositoryInterface;
use Core\Shared\Domain\Entity\User;

interface RepositoryInterface extends UserRepositoryInterface
{
	public function save(User $user): void;
	public function delete(User $user): void;
}
