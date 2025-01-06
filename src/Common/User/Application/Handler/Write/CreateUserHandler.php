<?php declare(strict_types=1);

namespace Core\Common\User\Application\Handler\Write;

use Core\Shared\Application\Handler\BaseHandler;
use Core\Common\User\Application\Command\CreateUserCommand;
use Core\Common\User\Domain\Repository\RoleRepositoryInterface;
use Core\Common\User\Domain\Repository\UserRepositoryInterface;
use Core\Common\User\Domain\Entity\User;

final class CreateUserHandler extends BaseHandler
{
    public function __construct(
        private private(set) RoleRepositoryInterface $role,
        private private(set) UserRepositoryInterface $user,
    ) {}

    public function handle(CreateUserCommand $command): bool
    {
        try {
            $role = $this->role->findById(id: $command->roleId);

            $user = new User(
                firstName: $command->firstName,
                lastName: $command->lastName,
                patronymic: $command->patronymic,
                phone: $command->phone,
                email: $command->email,
                password: $command->password,
                isActive: $command->isActive,
            );

            $user->addRole(role: $role);

            $this->user->save(user: $user);

            return true;
        }

        catch (\Exception $exception) {
            return false;
        }
    }
}
