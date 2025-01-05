<?php declare(strict_types=1);

namespace Core\Common\Account\Domain\Repository;
use Core\Common\Account\Domain\Entity\User;
use Core\Common\Account\Domain\ValueObject\UserId;

interface UserRepostitoryInterface
{
	public function create(User $user): void;
	public function update(UserId $id, User $user): void;
	public function delete(UserId $id): void;
}
