<?php declare(strict_types=1);

namespace Core\Common\User\Infrastructure\Provider;

use Illuminate\Support\ServiceProvider;
use Core\Common\User\Infrastructure\Repository\UserRepository;
use Core\Shared\Domain\Repository\UserRepositoryInterface;

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
