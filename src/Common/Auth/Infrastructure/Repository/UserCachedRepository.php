<?php declare(strict_types=1);

namespace Core\Common\Account\Infrastructure\Repository;

use Core\Common\Account\Domain\Entity\User;
use Core\Common\Account\Domain\ValueObject\UserId;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityNotFoundException;

final class UserCachedRepository
{
    private readonly EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function all(): array
    {
        return $this->entityManager->getRepository(User::class)->findAll();
    }

    public function find(string $id): ?User // Изменено на ?User для обработки отсутствия пользователя
    {
        $user = $this->entityManager->getRepository(User::class)->find($id);
        return $user instanceof User ? $user : null; // Возвращаем null, если пользователь не найден
    }

    public function create(User $user): void
    {
        $this->entityManager->persist($user);
        $this->entityManager->flush();
    }

    public function update(string $id, User $user): void
    {
        // Преобразуем строку ID в UserId
        $userId = new UserId($id);
        
        $existingUser = $this->find($id);
        
        if (!$existingUser) {
            throw new EntityNotFoundException('User not found.');
        }

        // Обновляем свойства существующего пользователя
        // Предполагается, что у вас есть соответствующие методы в классе User
        $existingUser->setFirstName($user->getFirstName());
        $existingUser->setLastName($user->getLastName());
        $existingUser->setEmail($user->getEmail());

        // Сохраняем изменения
        $this->entityManager->flush();
    }

    public function delete(string $id): void
    {
        // Преобразуем строку ID в UserId
        $userId = new UserId($id);
        
        $existingUser = $this->find($id);
        
        if (!$existingUser) {
            throw new EntityNotFoundException('User not found.');
        }

        $this->entityManager->remove($existingUser);
        $this->entityManager->flush();
    }
}