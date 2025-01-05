<?php declare(strict_types=1);

namespace Core\Common\Role\Infrastructure\Provider;

use Illuminate\Support\ServiceProvider;
use Core\Common\Role\Application\Query\GetRoleByIdQuery;
use Core\Common\Role\Application\Handler\Read\GetRoleByIdQueryHandler;
use Core\Shared\Domain\Contract\CommandBusContract;
use Core\Shared\Domain\Contract\QueryBusContract;

final class CqrsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        app(abstract: QueryBusContract::class)->register(map: [
            GetRoleByIdQuery::class => GetRoleByIdQueryHandler::class
        ]);
    }
}
