<?php declare(strict_types=1);

namespace Core\Common\Account\Domain\Repository;

use Core\Common\Account\Domain\Entity\User;
use Core\Common\Account\Domain\ValueObject\UserId;

interface UserMemoryRepostitoryInterface
{
	public function all(): array;
	public function find(UserId $id): ?User;
	public function save(User $user): void;
	public function remove(UserId $id): void;
}
