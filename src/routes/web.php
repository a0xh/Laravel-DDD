<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::namespace('Core\Presentation\Actions\Web\Auth')->group(function (): void {
    Route::controller(LoginAction::class)->group(function (): void {
        Route::get('login', 'showLoginForm')->name('login');
        Route::post('login', 'login');
        
        Route::post('logout', 'logout')->name('logout');
    });

    Route::controller(RegisterAction::class)->group(function (): void {
        Route::get('register', 'showRegistrationForm')->name('register');
        Route::post('register', 'register');
    });

    Route::controller(ForgotPasswordAction::class)->group(function (): void {
        Route::get('password/reset', 'showLinkRequestForm')->name('password.request');
        Route::post('password/email', 'sendResetLinkEmail')->name('password.email');
    });

    Route::controller(ResetPasswordAction::class)->group(function (): void {
        Route::get('password/reset/{token}', 'showResetForm')->name('password.reset');
        Route::post('password/reset', 'reset')->name('password.update');
    });

    Route::controller(ConfirmPasswordAction::class)->group(function (): void {
        Route::get('password/confirm', 'showConfirmForm')->name('password.confirm');
        Route::post('password/confirm', 'confirm');
    });

    Route::controller(VerificationAction::class)->group(function (): void {
        Route::get('email/verify', 'show')->name('verification.notice');
        Route::get('email/verify/{id}/{hash}', 'verify')->name('verification.verify');
        Route::get('email/resend', 'resend')->name('verification.resend');
    });
});
