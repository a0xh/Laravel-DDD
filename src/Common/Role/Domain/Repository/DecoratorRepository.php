<?php declare(strict_types=1);

namespace Core\Common\Role\Domain\Repository;

use Core\Shared\Domain\Entity\Role;
use Core\Shared\Domain\ValueObject\Role\RoleId;
use Core\Shared\Domain\ValueObject\Role\Slug;

abstract class DecoratorRepository implements RepositoryInterface
{
	private readonly private(set) RepositoryInterface $repository;

	protected function __construct(RepositoryInterface $repository)
	{
		$this->repository = $repository;
	}

	abstract protected function all(): array;
	abstract protected function findById(RoleId $id): ?Role;
	abstract protected function findBySlug(Slug $slug): ?Role;
}
