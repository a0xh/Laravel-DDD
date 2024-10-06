<?php declare(strict_types=1);

namespace Core\Common\Account\Application\Repository;

use Core\Common\Account\Domain\Repository\RepositoryInterface;
use Core\Common\Account\Domain\Aggregate\AccountAggregate;
use Core\Common\Account\Domain\Exception\UserNotFoundException;
use Core\Common\Account\Domain\Exception\RoleNotFoundException;
use Core\Common\Account\Domain\Factory\UserFactory;
use Core\Common\Account\Domain\Factory\RoleFactory;
use Core\Common\Account\Infrastructure\Mapper\UserMapper;
use Core\Common\Account\Infrastructure\Mapper\RoleMapper;
use Core\Shared\Infrastructure\Eloquent\User as UserEloquent;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Log;

abstract class DecoratorRepository implements RepositoryInterface
{
    private readonly RepositoryInterface $repository;
    protected MemoryRepository $collection;

    protected function __construct(RepositoryInterface $repository)
    {
        $this->repository = $repository;
        $this->collection = new MemoryRepository();

        $this->initializeCollection();
    }

    private function initializeCollection(): void
    {
        if (count(value: $this->collection->all()) === 0)
        {
            foreach ($this->repository->all() as $user) {
                $this->saveEntityToMemory(query: $user);
            }
        }
    }

    private function saveEntityToMemory(UserEloquent $query): void
    {
        try {
            if (!$query) {
                throw new UserNotFoundException(message: 'User Entity Is Null!');
            }

            $this->collection->save(
                aggregate: $this->createNewAggregate(user: $query)
            );
        }

        catch (UserNotFoundException | RoleNotFoundException $e) {
            Log::error(message: $e->getMessage());
        }

        catch (\Exception $e) {
            Log::error(message: 'An Unexpected Error Occurred: ' . $e->getMessage());
        }
    }

    private function createNewAggregate(UserEloquent $user): AccountAggregate
    {
        $userMapper = new UserMapper();

        return $this->mapRoles(
            aggregate: new AccountAggregate(user: UserFactory::create(
                attributes: $userMapper->toArray(eloquent: $user)
            )),
            eloquent: $user
        );
    }

    private function mapRoles(
        AccountAggregate $aggregate, UserEloquent $eloquent): AccountAggregate
    {
        $roleMapper = new RoleMapper();

        foreach ($eloquent->roles as $role) {
            if (!$role) {
                throw new RoleNotFoundException(message: 'Role Entity Is Null!');
            }
            
            $aggregate->addRoles(entity: RoleFactory::create(
                attributes: $roleMapper->toArray(eloquent: $role)
            ));
        }

        return $aggregate;
    }

    abstract public function paginate(int $perPage): LengthAwarePaginator;
}