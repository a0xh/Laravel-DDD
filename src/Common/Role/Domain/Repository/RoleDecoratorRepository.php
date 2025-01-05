<?php declare(strict_types=1);

namespace Core\Common\Role\Domain\Repository;

use Core\Common\Role\Domain\Entity\Role;
use Core\Common\Role\Domain\ValueObject\RoleId;
use Core\Common\Role\Domain\ValueObject\Slug;

abstract class RoleDecoratorRepository implements RoleRepositoryInterface
{
	private readonly private(set) RoleRepositoryInterface $repository;

	protected function __construct(RoleRepositoryInterface $repository)
	{
		$this->repository = $repository;
	}

	abstract protected function all(): array;
	abstract protected function findById(RoleId $id): ?Role;
	abstract protected function findBySlug(Slug $slug): ?Role;
}
