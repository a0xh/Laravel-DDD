<?php declare(strict_types=1);

namespace Core\Common\User\Infrastructure\Repository;

use Doctrine\ORM\EntityManagerInterface;
use Core\Common\User\Domain\Repository\DecoratorRepository;
use Core\Shared\Domain\Entity\User;
use Core\Shared\Domain\ValueObject\User\UserId;
use Core\Shared\Domain\ValueObject\User\Email;
use Doctrine\Common\Collections\Criteria;
use Core\Shared\Infrastructure\Paginator\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use Doctrine\ORM\ORMException;

final class DoctrineRepository extends DecoratorRepository 
{
    private readonly private(set) EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function all(): array
    {
        return $this->entityManager->getRepository(
            className: User::class
        )->findBy(criteria: [], orderBy: [
                'createdAt' => Criteria::DESC
            ]
        );
    }

    public function paginate(int $perPage = 11): LengthAwarePaginator
    {
        return new LengthAwarePaginator(
            items: $this->entityManager->getRepository(
                className: User::class
            )->findAll(),
            perPage: $perPage
        );
    }

    public function findById(UserId $id): ?User
    {
        return $this->entityManager->getRepository(
            className: User::class
        )->find(id: $id);
    }

    public function findByEmail(Email $email): ?User
    {
        return $this->entityManager->getRepository(
            className: User::class
        )->findOneBy(criteria: ['email' => $email]);
    }

    public function save(User $user): void
    {
        try {
            $this->entityManager->persist(object: $user);
            $this->entityManager->flush();
        }

        catch (ORMException $e) {
            throw new \RuntimeException(
                message: "Failed To Save User: {$e->getMessage()}",
                code: (int) $e->getCode(),
                previous: $e
            );
        }
    }

    public function delete(User $user): void
    {
        try {
            $this->entityManager->remove(object: $user);
            $this->entityManager->flush();
        }

        catch (ORMException $e) {
            throw new \RuntimeException(
                message: "Failed To Delete User: {$e->getMessage()}",
                code: (int) $e->getCode(),
                previous: $e
            );
        }
    }
}
