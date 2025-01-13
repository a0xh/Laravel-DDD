<?php declare(strict_types=1);

namespace Core\Common\User\Application\Handler\Write;

use Core\Shared\Application\Handler\Handler;
use Core\Common\User\Application\Command\CreateCommand;
use Core\Shared\Domain\Repository\RoleRepositoryInterface;
use Core\Shared\Domain\Repository\UserRepositoryInterface;
use Core\Shared\Domain\Entity\User;
use Core\Shared\Domain\ValueObject\User\Email;
use Core\Shared\Domain\ValueObject\Role\RoleId;
use Illuminate\Support\Facades\Hash;

final class CreateHandler extends Handler
{
    public function __construct(
        private readonly private(set) RoleRepositoryInterface $role,
        private readonly private(set) UserRepositoryInterface $user,
    ) {}

    public function handle(CreateCommand $command): bool
    {
        try {
            $role = $this->role->findById(
                id: RoleId::fromString(id: $command->roleId)
            );

            $user = new User(
                firstName: $command->firstName,
                lastName: $command->lastName,
                email: Email::fromString(email: $command->email),
                password: Hash::make(value: $command->password)
            );

            if ($command->phone !== null) {
                $user->setPatronymic(
                    patronymic: $command->patronymic
                );
            }

            if ($command->phone !== null) {
                $user->setPhone(phone: $command->phone);
            }

            $user->setStatus(status: $command->status);
            $user->addRole(role: $role);

            $this->user->save(user: $user);

            return true;
        }

        catch (\Exception $exception) {
            return false;
        }
    }
}
