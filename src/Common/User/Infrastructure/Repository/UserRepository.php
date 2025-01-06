<?php declare(strict_types=1);

namespace Core\Common\User\Infrastructure\Repository;

use Core\Common\User\Domain\Entity\User;
use Core\Common\User\Domain\Repository\UserDecoratorRepository;
use Core\Common\User\Domain\ValueObject\UserId;
use Core\Common\User\Domain\ValueObject\Email;
use Illuminate\Pagination\LengthAwarePaginator;

final class UserRepository extends UserDecoratorRepository
{
    public function __construct(
        private readonly private(set) CachedUserRepository $cached,
        private private(set) MemoryUserRepository $memory
    ) {
        $this->initializeCollection();
    }

    private function initializeCollection(): void
    {
        if (count(value: $this->memory->all()) === 0) {
            $collection = collect(value: $this->cached->all());
            
            $collection->each(callback: function(User $user): void {
                $this->memory->save(user: $user);
            });
        }
    }

    public function all(): array
    {
        $memory = $this->memory->all();

        if (!empty($memory)) {
            return $memory;
        }

        $cached = $this->cached->all();

        return $cached;
    }

    public function paginate(int $perPage = 11): LengthAwarePaginator
    {
        $memory = $this->memory->paginate(perPage: $perPage);

        if ($memory->count() > 0) {
            return $memory;
        }

        $cached = $this->cached->paginate(perPage: $perPage);

        return $cached;
    }

    public function findById(UserId $id): ?User
    {
        $memory = $this->memory->findById(id: $id);

        if ($memory !== null) {
            return $memory;
        }

        $cached = $this->cached->findById(id: $id);

        return $cached;
    }

    public function findByEmail(Email $email): ?User
    {
        $memory = $this->memory->findByEmail(email: $email);

        if ($memory !== null) {
            return $memory;
        }
        
        $cached = $this->cached->findByEmail(email: $email);
        
        return $cached;
    }

    public function save(User $user): void
    {
        $this->memory->save(user: $user);
        $this->cached->save(user: $user);
    }

    public function delete(User $user): void
    {
        $this->memory->delete(user: $user);
        $this->cached->delete(user: $user);
    }
}
