<?php declare(strict_types=1);

namespace Core\Common\User\Infrastructure\Provider;

use Illuminate\Support\ServiceProvider;
use Core\Common\User\Application\Command\CreateUserCommand;
use Core\Common\User\Application\Handler\Write\CreateUserHandler;
use Core\Common\User\Application\Query\GetUserByIdQuery;
use Core\Common\User\Application\Handler\Read\GetUserByIdQueryHandler;
use Core\Shared\Domain\Contract\CommandBusContract;
use Core\Shared\Domain\Contract\QueryBusContract;

final class CqrsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        app(abstract: CommandBusContract::class)->register(map: [
            CreateUserCommand::class => CreateUserHandler::class
        ]);

        app(abstract: QueryBusContract::class)->register(map: [
            GetUserByIdQuery::class => GetUserByIdQueryHandler::class
        ]);
    }
}
