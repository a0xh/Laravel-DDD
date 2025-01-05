<?php declare(strict_types=1);

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Middleware\HandleCors;
use Illuminate\Http\Request;

return Application::configure(
    basePath: dirname(path: __DIR__)
)->withRouting(
    web: __DIR__ . '/../routes/web.php',
    api: __DIR__ . '/../routes/api.php',
    commands: __DIR__ . '/../routes/console.php',
    health: '/up',
)->withMiddleware(
    callback: function (Middleware $middleware): void {
        $middleware->web(append: HandleCors::class);
    }
)->withExceptions(
    using: function (Exceptions $exceptions): void {
        // $exceptions->shouldRenderJsonWhen(
        //     callback: function (Request $request, \Throwable $e): bool {
        //         if ($request->is(patterns: 'api/*')) {
        //             return true;
        //         }

        //         return $request->expectsJson();
        //     }
        // );
    }
)->create();
