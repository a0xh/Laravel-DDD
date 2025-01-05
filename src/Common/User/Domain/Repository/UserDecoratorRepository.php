<?php declare(strict_types=1);

namespace Core\Common\User\Domain\Repository;

use Core\Common\User\Domain\Entity\User;
use Core\Common\User\Domain\ValueObject\UserId;
use Core\Common\User\Domain\ValueObject\Email;
use Illuminate\Pagination\LengthAwarePaginator;

abstract class UserDecoratorRepository implements UserRepositoryInterface
{
	private readonly private(set) UserRepositoryInterface $repository;

	protected function __construct(UserRepositoryInterface $repository)
	{
		$this->repository = $repository;
	}

	abstract protected function all(): array;
	abstract protected function paginate(int $perPage = 11): LengthAwarePaginator;
	abstract protected function findById(UserId $id): ?User;
	abstract protected function findByEmail(Email $email): ?User;
}
