<?php declare(strict_types=1);

namespace Core\Common\Role\Infrastructure\Repository;

use Core\Common\Role\Domain\Entity\Role;
use Core\Common\Role\Domain\Repository\RoleDecoratorRepository;
use Doctrine\ORM\EntityManagerInterface;
use Core\Common\Role\Domain\ValueObject\RoleId;
use Core\Common\Role\Domain\ValueObject\Slug;
use Doctrine\ORM\EntityNotFoundException;
use Doctrine\ORM\ORMException;

final class QueryRoleRepository extends RoleDecoratorRepository 
{
    public function __construct(
        private private(set) EntityManagerInterface $entityManager
    ) {}

    public function all(): array
    {
        return $this->entityManager->getRepository(
            className: Role::class
        )->findAll();
    }

    public function findById(RoleId $id): ?Role
    {
        return $this->entityManager->getRepository(
            className: Role::class
        )->find(id: $id);
    }

    public function findBySlug(Slug $slug): ?Role
    {
        return $this->entityManager->getRepository(
            className: Role::class
        )->findOneBy(criteria: ['slug' => $slug]);
    }

    public function save(Role $role): void
    {
        try {
            $this->entityManager->persist(object: $role);
            $this->entityManager->flush();
        }

        catch (ORMException $e) {
            throw new \RuntimeException(
                message: "Failed To Save Role: {$e->getMessage()}",
                code: (int) $e->getCode(),
                previous: $e
            );
        }
    }

    public function delete(Role $role): void
    {
        try {
            $this->entityManager->remove(object: $role);
            $this->entityManager->flush();
        }

        catch (ORMException $e) {
            throw new \RuntimeException(
                message: "Failed To Delete Role: {$e->getMessage()}",
                code: (int) $e->getCode(),
                previous: $e
            );
        }
    }
}
