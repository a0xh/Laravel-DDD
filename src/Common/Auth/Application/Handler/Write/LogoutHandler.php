<?php declare(strict_types=1);

namespace Core\Common\Auth\Application\Handler\Write;

use Core\Shared\Application\Handler\Handler;
use Core\Common\Auth\Application\Command\LogoutCommand;
use Illuminate\Support\Facades\Auth;

final class LogoutHandler
{
	public function handle(LogoutCommand $command): bool
	{
        $user = Auth::user();

        if ($user) {
            return $user->tokens()->delete() > 0;
        }
        
        return false;
	}
}
