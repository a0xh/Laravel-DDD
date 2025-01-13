<?php declare(strict_types=1);

namespace Core\Common\User\Application\Handler\Write;

use Core\Shared\Application\Handler\Handler;
use Core\Common\User\Application\Command\UpdateCommand;
use Core\Shared\Domain\Repository\RoleRepositoryInterface;
use Core\Shared\Domain\Repository\UserRepositoryInterface;
use Core\Shared\Domain\ValueObject\User\UserId;
use Core\Shared\Domain\ValueObject\User\Email;
use Core\Shared\Domain\ValueObject\Role\RoleId;
use Illuminate\Support\Facades\Hash;

final class UpdateHandler extends Handler
{
    public function __construct(
        private readonly private(set) RoleRepositoryInterface $role,
        private readonly private(set) UserRepositoryInterface $user,
    ) {}

    public function handle(UpdateCommand $command): bool
    {
        try {
            $role = $this->role->findById(
                id: RoleId::fromString(id: $command->roleId)
            );

            $user = $this->user->findById(
                id: UserId::fromString(id: $command->id)
            );

            $user->setFirstName(firstName: $command->firstName);
            $user->setLastName(lastName: $command->lastName);

            if ($command->patronymic !== null) {
                $user->setPatronymic(patronymic: $command->patronymic);
            }

            if ($command->phone !== null) {
                $user->setPhone(phone: $command->phone);
            }

            $user->setEmail(email: Email::fromString(
                email: $command->email
            ));

            $user->setPassword(password: Hash::make(
                value: $command->password
            ));

            $user->setStatus(status: $command->status);

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
