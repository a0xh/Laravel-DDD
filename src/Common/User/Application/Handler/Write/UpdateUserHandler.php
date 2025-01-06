<?php declare(strict_types=1);

namespace Core\Common\User\Application\Handler\Write;

use Core\Shared\Application\Handler\BaseHandler;
use Core\Common\User\Domain\Repository\RoleRepositoryInterface;
use Core\Common\User\Domain\Repository\UserRepositoryInterface;
use Core\Common\User\Application\Command\UpdateUserCommand;

final class UpdateUserHandler extends BaseHandler
{
    public function __construct(
        private private(set) RoleRepositoryInterface $role,
        private private(set) UserRepositoryInterface $user,
    ) {}

    public function handle(UpdateUserCommand $command): bool
    {
        try {
            $role = $this->role->findById(id: $command->roleId);
            $user = $this->user->findById(id: $command->id);

            $user->setFirstName(firstName: $command->firstName);
            $user->setLastName(lastName: $command->lastName);

            if ($command->patronymic !== null) {
                $user->setPatronymic(patronymic: $command->patronymic);
            }

            if ($command->phone !== null) {
                $user->setPhone(phone: $command->phone);
            }

            $user->setEmail(email: $command->email);
            $user->setPassword(password: $command->password);
            $user->setIsActive(status: $command->isActive);

            foreach ($user->getRoles() as $existingRole) {
                if ($existingRole !== $role) {
                    $user->removeRole(role: $existingRole);
                }
            }

            $user->addRole(role: $role);

            $this->user->save(user: $user);

            return true;
        }

        catch (\Exception $exception) {
            return false;
        }
    }
}
