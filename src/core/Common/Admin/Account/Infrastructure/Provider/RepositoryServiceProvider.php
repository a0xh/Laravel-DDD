<?php declare(strict_types=1);

namespace Core\Common\Admin\Account\Infrastructure\Provider;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->when(
            concrete: [
                \Core\Common\Admin\Account\Application\Service\UserService::class,
            ]
        )->needs(
            abstract: \Core\Common\Admin\Account\Domain\Repository\RepositoryInterface::class
        )->give(
            implementation: \Core\Common\Admin\Account\Infrastructure\Repository\EloquentUserRepository::class
        );
    }
}
