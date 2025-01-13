<?php declare(strict_types=1);

namespace Core\Common\User\Domain\Repository;

use Core\Shared\Domain\Entity\User;
use Core\Shared\Domain\ValueObject\User\UserId;
use Core\Shared\Domain\ValueObject\User\Email;
use Illuminate\Pagination\LengthAwarePaginator;

abstract class DecoratorRepository implements RepositoryInterface
{
	private readonly private(set) RepositoryInterface $repository;

	protected function __construct(RepositoryInterface $repository)
	{
		$this->repository = $repository;
	}

	abstract protected function all(): array;
	abstract protected function paginate(int $perPage = 11): LengthAwarePaginator;
	abstract protected function findById(UserId $id): ?User;
	abstract protected function findByEmail(Email $email): ?User;
}
