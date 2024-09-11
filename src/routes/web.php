<?php declare(strict_types=1);

use Illuminate\Support\Facades\Route;

Route::namespace('Core\Web\Common\User\Presentation\Actions\Content')->group(
    function (): void {
        Route::get('/', HomeAction::class)->name('home');
        Route::get('/category/{slug}', CategoryAction::class)->name('category');
        Route::get('/tag/{slug}', TagAction::class)->name('tag');
        Route::get('/post/{slug}', PostAction::class)->name('post');
        Route::get('/search/{query}', SearchAction::class)->name('search');
        Route::post('/search', SearchAction::class)->name('search.store');
    }
);

Route::namespace('Core\Web\Common\User\Presentation\Actions\Comment')->group(
    function (): void {
        Route::post('/comment', StoreAction::class)->name('comment.store');
        Route::put('/comment/{id}', UpdateAction::class)->name('comment.update');
        Route::delete('/comment/{id}', DeleteAction::class)->name('comment.delete');
    }
);

Route::namespace('Core\Web\Common\User\Presentation\Actions\Knowledge')->group(
    function (): void {
        Route::get('/agreement', AgreementAction::class)->name('agreement');
        Route::get('/policy', PolicyAction::class)->name('policy');
        Route::get('/about', AboutAction::class)->name('about');
    }
);

Route::namespace('Core\Web\Common\User\Presentation\Actions\Outreach')->group(
    function (): void {
        Route::post('/subscription', SubscribtionAction::class)->name('subscription.store');
        Route::get('/contact', ContactAction::class)->name('contact');
        Route::post('/contact', ContactAction::class)->name('contact.store');
    }
);

Route::namespace('Core\Web\Shared\Presentation\Controllers')->group(
    function (): void {
        Route::controller(LoginController::class)->group(function (): void {
            Route::get('login', 'showLoginForm')->name('login');
            Route::post('login', 'login');
            
            Route::post('logout', 'logout')->name('logout');
        });

        Route::controller(RegisterController::class)->middleware('guest')->group(function (): void {
            Route::get('register', 'showRegistrationForm')->name('register');
            Route::post('register', 'register');
        });

        Route::controller(ForgotPasswordController::class)->group(function (): void {
            Route::get('password/reset', 'showLinkRequestForm')->name('password.request');
            Route::post('password/email', 'sendResetLinkEmail')->name('password.email');
        });

        Route::controller(ResetPasswordController::class)->group(function (): void {
            Route::get('password/reset/{token}', 'showResetForm')->name('password.reset');
            Route::post('password/reset', 'reset')->name('password.update');
        });

        Route::controller(ConfirmPasswordController::class)->group(function (): void {
            Route::get('password/confirm', 'showConfirmForm')->name('password.confirm');
            Route::post('password/confirm', 'confirm');
        });

        Route::controller(VerificationController::class)->group(function (): void {
            Route::get('email/verify', 'show')->name('verification.notice');
            Route::get('email/verify/{id}/{hash}', 'verify')->name('verification.verify');
            Route::get('email/resend', 'resend')->name('verification.resend');
        });
    }
);
