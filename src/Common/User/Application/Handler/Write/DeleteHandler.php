<?php declare(strict_types=1);

namespace Core\Common\User\Application\Handler\Write;

use Core\Shared\Application\Handler\Handler;
use Core\Common\User\Application\Command\DeleteCommand;
use Core\Shared\Domain\Repository\UserRepositoryInterface;
use Core\Shared\Domain\ValueObject\User\UserId;

final class DeleteHandler extends Handler
{
    private readonly private(set) UserRepositoryInterface $user;

    public function __construct(UserRepositoryInterface $user)
    {
        $this->user = $user;
    }

    public function handle(DeleteCommand $command): bool
    {
        try {
            $user = $this->user->findById(
                id: UserId::fromString(id: $command->id)
            );

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
