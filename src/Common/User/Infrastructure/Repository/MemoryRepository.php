<?php declare(strict_types=1);

namespace Core\Common\User\Infrastructure\Repository;

use Core\Common\User\Domain\Repository\DecoratorRepository;
use Core\Shared\Domain\Entity\User;
use Core\Shared\Domain\ValueObject\User\UserId;
use Core\Shared\Domain\ValueObject\User\Email;
use Illuminate\Pagination\LengthAwarePaginator;

final class MemoryRepository extends DecoratorRepository
{
    private private(set) array $collection;

    public function __construct(array $users = [])
    {
        $this->collection = $users;
    }

    public function all(): array
    {
        return array_values(array: $this->collection);
    }

    public function paginate(int $perPage = 11): LengthAwarePaginator
    {
        return new Paginator(
            items: $this->collection,
            perPage: $perPage
        );
    }

    public function findById(UserId $id): ?User
    {
        return $this->collection[$id->asString()] ?? null;
    }

    public function findByEmail(Email $email): ?User
    {
        return $this->collection[$email->asString()] ?? null;
    }

    public function save(User $user): void
    {
        $this->collection[] = $user;
    }

    public function delete(User $user): void
    {
        unset($this->collection[$user->getId()->asString()]);
    }
}
