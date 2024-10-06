<?php declare(strict_types=1);

namespace Core\Common\Account\Infrastructure\Provider;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->when(
            concrete: [
                \Core\Common\Account\Presentation\Controller\IndexController::class,
            ]
        )->needs(
            abstract: \Core\Common\Account\Domain\Repository\RepositoryInterface::class
        )->give(
            implementation: \Core\Common\Account\Application\Repository\EntityRepository::class
        );
    }
}
