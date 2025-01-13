<?php declare(strict_types=1);

namespace Core\Common\Auth\Infrastructure\Provider;

use Illuminate\Support\ServiceProvider;
use Core\Common\Auth\Application\Command\VerifyCommand;
use Core\Common\Auth\Application\Handler\Write\VerifyHandler;
use Core\Common\Auth\Application\Command\RegisterCommand;
use Core\Common\Auth\Application\Handler\Write\RegisterHandler;
use Core\Common\Auth\Application\Command\LoginCommand;
use Core\Common\Auth\Application\Handler\Write\LoginHandler;
use Core\Common\Auth\Application\Command\LogoutCommand;
use Core\Common\Auth\Application\Handler\Write\LogoutHandler;
use Core\Shared\Domain\Contract\CommandBusContract;

final class CqrsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        app(abstract: CommandBusContract::class)->register(map: [
            RegisterCommand::class => RegisterHandler::class,
            VerifyCommand::class => VerifyHandler::class,
            LoginCommand::class => LoginHandler::class,
            LogoutCommand::class => LogoutHandler::class,
        ]);
    }
}
