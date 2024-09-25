<?php declare(strict_types=1);

use Core\Shared\Infrastructure\Illuminate\Application;
use Illuminate\Foundation\Configuration\{Exceptions, Middleware};
use Illuminate\View\Middleware\ShareErrorsFromSession;

return Application::configure(
    basePath: dirname(__DIR__)
)->withRouting(
    web: __DIR__ . '/../routes/web.php',
    commands: __DIR__ . '/../routes/console.php',
    health: '/up',
)->withMiddleware(
    callback: function (Middleware $middleware): void {
        $middleware->appendToGroup(
            group: 'web',
            middleware: ShareErrorsFromSession::class
        );
    }
)->withExceptions(
    using: function (Exceptions $exceptions): void {
        // Code...
    }
)->withCommands(
    commands: [
        __DIR__ . '/../core',
    ]
)->create()->useAppPath(
    path: __DIR__ . '/../core'
)->useConfigPath(
    path: __DIR__ . '/../../config'
);
