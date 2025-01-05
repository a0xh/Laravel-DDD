<?php declare(strict_types=1);

namespace Core\Common\Account\Domain\Repository;

use Core\Common\Account\Domain\Entity\User;
use Core\Common\Account\Domain\ValueObject\UserId;
use Illuminate\Support\Collection;

abstract class UserDecoratorRepository implements UserRepostitoryInterface
{
	protected private(set) UserRepostitoryInterface $repository;

	protected function __construct(UserRepostitoryInterface $repository)
	{
		$this->repository = $repository;
	}

	abstract protected function all(): array;
	abstract protected function findById(UserId $id): ?User;
	abstract protected function findByEmail(string $email): ?User;
}
