<?php declare(strict_types=1);

namespace Core\Common\Role\Infrastructure\Repository;

use Core\Shared\Domain\Entity\Role;
use Core\Common\Role\Domain\Repository\DecoratorRepository;
use Core\Shared\Domain\ValueObject\Role\RoleId;
use Core\Shared\Domain\ValueObject\Role\Slug;
use Doctrine\ORM\EntityNotFoundException;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\ORMException;

final class QueryRepository extends DecoratorRepository 
{
    private readonly private(set) EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

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
        )->findOneBy(criteria: ['slug.slug' => $slug]);
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
