<?php declare(strict_types=1);

namespace Core\Common\User\Infrastructure\Provider;

use Illuminate\Support\ServiceProvider;
use Core\Common\User\Application\Query\GetAllQuery;
use Core\Common\User\Application\Handler\Read\GetAllQueryHandler;
use Core\Common\User\Application\Query\GetByIdQuery;
use Core\Common\User\Application\Handler\Read\GetByIdQueryHandler;
use Core\Common\User\Application\Command\CreateCommand;
use Core\Common\User\Application\Handler\Write\CreateHandler;
use Core\Common\User\Application\Command\UpdateCommand;
use Core\Common\User\Application\Handler\Write\UpdateHandler;
use Core\Common\User\Application\Command\DeleteCommand;
use Core\Common\User\Application\Handler\Write\DeleteHandler;
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
            CreateCommand::class => CreateHandler::class,
            UpdateCommand::class => UpdateHandler::class,
            DeleteCommand::class => DeleteHandler::class,
        ]);

        app(abstract: QueryBusContract::class)->register(map: [
            GetAllQuery::class => GetAllQueryHandler::class,
            GetByIdQuery::class => GetByIdQueryHandler::class,
        ]);
    }
}
