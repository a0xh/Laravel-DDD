<?php declare(strict_types=1);

namespace Core\Common\User\Domain\Repository;

use Core\Common\User\Domain\Entity\User;

interface UserRepositoryInterface
{
	public function save(User $user): void;
	public function delete(User $user): void;
}
