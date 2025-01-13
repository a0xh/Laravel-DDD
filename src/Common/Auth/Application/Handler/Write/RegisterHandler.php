<?php declare(strict_types=1);

namespace Core\Common\Auth\Application\Handler\Write;

use Core\Shared\Application\Handler\Handler;
use Core\Common\Auth\Application\Command\RegisterCommand;
use Core\Shared\Domain\Repository\RoleRepositoryInterface;
use Core\Shared\Domain\Repository\UserRepositoryInterface;
use Core\Shared\Domain\Entity\User;
use Core\Shared\Domain\ValueObject\User\Email;
use Core\Shared\Domain\ValueObject\Role\Slug;
use Illuminate\Support\Facades\Hash;
use Core\Common\Auth\Infrastructure\Notification\EmailVerifyNotification;
use Illuminate\Support\Facades\Notification;
use Illuminate\Auth\Events\Registered;

final class RegisterHandler extends Handler
{
    public function __construct(
        private readonly private(set) RoleRepositoryInterface $role,
        private readonly private(set) UserRepositoryInterface $user,
    ) {}

    public function handle(RegisterCommand $command): bool
    {
        try {
            $role = $this->role->findBySlug(
                slug: Slug::fromString(slug: 'customer')
            );

            if (!$role) {
                throw new Exception(message: 'Role Not Found.');
            }

            $user = new User(
                firstName: $command->firstName,
                lastName: $command->lastName,
                email: Email::fromString(email: $command->email),
                password: Hash::make(value: $command->password)
            );

            $user->setStatus(status: true);
            $user->addRole(role: $role);

            $this->user->save(user: $user);

            event(new Registered(user: $user));

            try {
                Notification::send(
                    notifiables: $user,
                    notification: new EmailVerifyNotification(user: $user)
                );
            } catch (\Exception $e) {
                $this->user->delete(user: $user);

                $message = 'Failed To Send Email Verification Notification';

                throw new \Exception(
                    message: $message . ': ' . $e->getMessage()
                );
            }

            return true;
        }

        catch (\Exception $exception) {
            return false;
        }
    }
}
