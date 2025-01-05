<?php declare(strict_types=1);

namespace Core\Common\Role\Infrastructure\Provider;

use Illuminate\Support\ServiceProvider;
use Core\Common\Role\Domain\Repository\RoleRepositoryInterface;
use Core\Common\Role\Infrastructure\Repository\RoleRepository;

final class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            abstract: RoleRepositoryInterface::class,
            concrete: RoleRepository::class
        );
    }
}
