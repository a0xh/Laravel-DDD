<?php declare(strict_types=1);

return [
    App\Providers\AppServiceProvider::class,
    App\Providers\TelescopeServiceProvider::class,
    Barryvdh\Debugbar\ServiceProvider::class,
    Core\Shared\Infrastructure\Provider\AppServiceProvider::class,
    Core\Shared\Infrastructure\Provider\DoctrineServiceProvider::class,
    Core\Common\Role\Infrastructure\Provider\CqrsServiceProvider::class,
    Core\Common\Role\Infrastructure\Provider\RepositoryServiceProvider::class,
    Core\Common\User\Infrastructure\Provider\CqrsServiceProvider::class,
    Core\Common\User\Infrastructure\Provider\RepositoryServiceProvider::class,
];
