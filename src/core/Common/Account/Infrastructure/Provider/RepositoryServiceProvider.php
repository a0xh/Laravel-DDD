<?php declare(strict_types=1);

namespace Core\Common\Account\Infrastructure\Provider;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->when(
            concrete: [
                \Core\Common\Account\Presentation\Action\IndexAction::class,
                \Core\Common\Account\Presentation\Action\EditAction::class,
            ]
        )->needs(
            abstract: \Core\Common\Account\Domain\Repository\RepositoryInterface::class
        )->give(
            implementation: \Core\Common\Account\Application\Repository\EntityRepository::class
        );
    }
}
