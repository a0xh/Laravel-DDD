<?php declare(strict_types=1);

namespace Core\Common\Auth\Application\Handler\Write;

use Core\Shared\Application\Handler\Handler;
use Core\Common\Auth\Application\Command\LoginCommand;
use Illuminate\Support\Facades\Auth;

final class LoginHandler extends Handler
{
    public function handle(LoginCommand $command): ?string
    {
        try {
            if (Auth::attempt(credentials: $command->toArray())) {
                $user = Auth::user();

                $token = $user->createToken(
                    name: config(key: 'app.name'), abilities: ['*']
                );

                return $token->plainTextToken;
            }
        }

        catch (\Exception $exception) {
            return null;
        }
    }
}
