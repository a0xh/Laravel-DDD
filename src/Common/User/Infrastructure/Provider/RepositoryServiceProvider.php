<?php declare(strict_types=1);

namespace Core\Common\User\Infrastructure\Provider;

use Illuminate\Support\ServiceProvider;
use Core\Common\User\Domain\Repository\UserRepositoryInterface;
use Core\Common\User\Infrastructure\Repository\UserRepository;

final class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            abstract: UserRepositoryInterface::class,
            concrete: UserRepository::class
        );
    }
}
