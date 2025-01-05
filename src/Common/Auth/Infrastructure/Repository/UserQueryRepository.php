<?php declare(strict_types=1);

namespace Core\Common\Account\Infrastructure\Repository;

use Core\Common\Account\Domain\Repository\UserDecoratorRepository;
use Core\Common\Account\Domain\Entity\User;
use Core\Common\Account\Domain\Entity\Role;
use Core\Common\Account\Domain\ValueObject\UserId;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityNotFoundException;
use Doctrine\Common\Collections\Criteria;
use Illuminate\Support\Collection;

final class UserQueryRepository extends UserDecoratorRepository 
{
    private readonly EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function all(): array
    {
        $query = $this->entityManager->getRepository(
            className: User::class
        );

        return $query->orderBy(
            sort: 'u.createdAt',
            order: Criteria::DESC
        )->findAll();
    }

    public function findById(UserId $id): ?User
    {
        $query = $this->entityManager->getRepository(
            className: User::class
        )->find(id: $id);

        return $query instanceof User ? $query : null;
    }

    public function findByEmail(string $email): ?User
    {
        $query = $this->entityManager->createQueryBuilder(
            alias: 'u'
        )->select('u', 'r')->leftJoin(
            join: 'u.roles',
            alias: 'r'
        )->where(
            predicates: 'u.email = :email'
        )->setParameter(
            key: 'email',
            value: $email
        );

        if ($query instanceof User) {
            return $query->getQuery()->getOneOrNullResult();
        }

        return null;
    }

    public function create(User $user): void
    {
        $this->entityManager->persist(object: $user);
        $this->entityManager->flush();
    }

    public function update(UserId $id, User $user): void
    {
        $existingUser = $this->find($id);
        
        if (!$existingUser) {
            throw new EntityNotFoundException(
                message: 'User not found.'
            );
        }

        $existingUser->setFirstName($user->getFirstName());
        $existingUser->setLastName($user->getLastName());
        $existingUser->setEmail($user->getEmail());

        $this->entityManager->flush();
    }

    public function delete(UserId $id): void
    {
        $existingUser = $this->find($id);
        
        if (!$existingUser) {
            throw new EntityNotFoundException(
                message: 'User not found.'
            );
        }

        $this->entityManager->remove($existingUser);
        $this->entityManager->flush();
    }
}