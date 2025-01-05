<?php declare(strict_types=1);

namespace Core\Common\User\Infrastructure\Repository;

use Core\Common\User\Domain\Entity\User;
use Core\Common\User\Domain\Repository\UserDecoratorRepository;
use Doctrine\ORM\EntityManagerInterface;
use Core\Common\User\Domain\ValueObject\UserId;
use Core\Common\User\Domain\ValueObject\Email;
use Doctrine\ORM\EntityNotFoundException;
use Illuminate\Pagination\LengthAwarePaginator;
use Doctrine\Common\Collections\Criteria;
use Doctrine\ORM\ORMException;

final class QueryUserRepository extends UserDecoratorRepository 
{
    public function __construct(
        private private(set) EntityManagerInterface $entityManager
    ) {}

    public function all(): array
    {
        return $this->entityManager->getRepository(
            className: User::class
        )->findAll();
    }

    public function paginate(int $perPage = 11): LengthAwarePaginator
    {
        return new Paginator(
            items: $this->entityManager->getRepository(
                className: User::class
            )->orderBy(
                sort: 'u.createdAt',
                order: Criteria::DESC
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
