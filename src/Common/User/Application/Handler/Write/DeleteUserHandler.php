<?php declare(strict_types=1);

namespace Core\Common\User\Application\Handler\Write;

use Core\Shared\Application\Handler\BaseHandler;
use Core\Common\User\Domain\Repository\UserRepositoryInterface;
use Core\Common\User\Application\Command\DeleteUserCommand;

final class DeleteUserHandler extends BaseHandler
{
    public function __construct(
        private private(set) UserRepositoryInterface $user,
    ) {}

    public function handle(DeleteUserCommand $command): bool
    {
        try {
            $user = $this->user->findById(id: $command->id);

            foreach ($user->getRoles() as $existingRole) {
                $user->removeRole(role: $existingRole);
            }

            $this->user->delete(user: $user);

            return true;
        }

        catch (\Exception $exception) {
            return false;
        }
    }
}
