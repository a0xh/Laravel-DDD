<?php declare(strict_types=1);

use Illuminate\Support\Facades\Route;

Route::namespace('Core\Common\Account\Presentation\Controller')->group(
    function (): void {
        Route::controller(Login::class)->group(function (): void {
            Route::get('login', 'showLoginForm')->name('login');
            Route::post('login', 'login');
            
            Route::post('logout', 'logout')->name('logout');
        });

        Route::controller(Register::class)->middleware('guest')->group(function (): void {
            Route::get('register', 'showRegistrationForm')->name('register');
            Route::post('register', 'register');
        });

        Route::controller(ForgotPassword::class)->group(function (): void {
            Route::get('password/reset', 'showLinkRequestForm')->name('password.request');
            Route::post('password/email', 'sendResetLinkEmail')->name('password.email');
        });
    }
);

Route::namespace('Core\Common\Account\Presentation\Action')->group(
    function (): void {
        Route::get('/admin/users', IndexAction::class)->name('admin.users.index');
        Route::get('/admin/users/{id}/edit', EditAction::class)->name('admin.users.edit');
        Route::get('/admin/users/create', CreateAction::class)->name('admin.users.create');
    }
);
