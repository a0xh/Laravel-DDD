<?php declare(strict_types=1);

namespace Core\Shared\Infrastructure\Provider;

use Illuminate\Support\ServiceProvider;
use Core\Shared\Domain\Contract\CommandBusContract;
use Core\Shared\Application\Bus\CommandBus;
use Core\Shared\Domain\Contract\QueryBusContract;
use Core\Shared\Application\Bus\QueryBus;

final class CqrsBusServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(
            abstract: CommandBusContract::class,
            concrete: CommandBus::class
        );

        $this->app->singleton(
            abstract: QueryBusContract::class,
            concrete: QueryBus::class
        );
    }
}
