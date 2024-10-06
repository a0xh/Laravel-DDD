<?php declare(strict_types=1);

namespace Core\Common\Account\Domain\Repository;

use Core\Common\Account\Domain\Entity\UserEntity;
use Core\Common\Account\Domain\Aggregate\AccountAggregate;
use Core\Shared\Domain\ValueObject\User\UserId;

/**
 * Interface RepositoryInterface
 *
 * This interface defines the contract for a repository that manages 
 * user entities. It provides methods for basic CRUD operations and 
 * retrieval of user data.
 *
 * @package Core\Common\Account\Domain\Repository
 */
interface RepositoryInterface
{
    /**
     * Retrieve all user entities from the repository.
     *
     * @return UserEntity[] An array of UserEntity instances.
     */
    #[\ReturnTypeWillChange]
    public function all();

    /**
     * Find a user entity by its unique identifier.
     *
     * @param UserId $id The unique identifier of the user.
     *
     * @return UserEntity|UserEloquent The UserEntity if found,
     * or an empty UserEloquent if not found.
     */
    #[\ReturnTypeWillChange]
    public function find(UserId $id);

    /**
     * Save a user entity to the repository.
     *
     * @param UserEntity $entity The user entity to be saved.
     *
     * @return void|bool Returns true on success, false on failure,
     * or void if no return is needed.
     */
    #[\ReturnTypeWillChange]
    public function save(AccountAggregate $aggregate);

    /**
     * Remove a user entity from the repository by its unique identifier.
     *
     * @param UserId $id The unique identifier of the user to be removed.
     *
     * @return void|bool Returns true on success, false on failure,
     * or void if no return is needed.
     */
    #[\ReturnTypeWillChange]
    public function remove(UserId $id);
}
