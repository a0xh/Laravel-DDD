<?php declare(strict_types=1);

namespace Core\Common\User\Auth\Infrastructure\Providers;

use Illuminate\Support\ServiceProvider;

class RegisterServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            \Core\Common\User\Auth\Domain\Repositories\RepositoryInterface::class,
            \Core\Common\User\Auth\Infrastructure\Repositories\RegisterRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
