<?php declare(strict_types=1);

namespace Core\Common\Auth\Application\Handler\Write;

use Core\Shared\Application\Handler\Handler;
use Core\Common\Auth\Application\Command\VerifyCommand;
use Core\Shared\Domain\Repository\UserRepositoryInterface;
use Core\Common\Auth\Application\Service\SignatureService;
use Core\Shared\Domain\Entity\User;
use Core\Shared\Domain\ValueObject\User\UserId;
use Illuminate\Support\Facades\Log;

final class VerifyHandler extends Handler
{
    private readonly private(set) UserRepositoryInterface $user;

    public function __construct(UserRepositoryInterface $user)
    {
        $this->user = $user;
    }

    public function handle(VerifyCommand $command): ?User
    {
        try {
            $user = $this->user->findById(
                id: UserId::fromString(id: $command->userId)
            );

            if (!$user) {
                throw new Exception(message: 'User Not Found.');
            }

            $hasValidHash = new SignatureService()->hasValid(
                userId: $user->getId()->asString(),
                email: $user->getEmail()->asString(),
                hash: $command->hash
            );

            if (!$hasValidHash) {
                throw new \InvalidArgumentException(
                    message: 'Invalid Hash Provided For Verification.'
                );
            }

            if ($user->hasVerifiedEmail()) {
                throw new \RuntimeException(
                    message: 'Email Has Already Been Verified.'
                );
            }

            $user->markEmailAsVerified();

            $this->user->save(user: $user);

            return $user;
        }

        catch (\Exception $e) {
            Log::error(
                message: 'General Error: ' . $e->getMessage(),
                context: ['code' => (int) $e->getCode()]
            );

            return null;
        }
    }
}
