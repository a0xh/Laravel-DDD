<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Notification;
use App\Notifications\EmailVerificationNotification;

class AuthController extends Controller
{
    // Регистрация пользователя
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Notification::send($user, new EmailVerificationNotification());

        return redirect()->route('login')->with('success', 'Регистрация прошла успешно.');
    }

    public function verify($id, Request $request)
    {
        $user = User::findOrFail($id);

        if (!$user->hasVerifiedEmail()) {
            $user->markEmailAsVerified();
            return redirect()->route('login')->with('success', 'Ваш email был успешно подтвержден.');
        }

        return redirect()->route('login')->with('info', 'Ваш email уже подтвержден.');
    }


    // Авторизация пользователя
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard')->with('success', 'Вы вошли в систему.');
        }

        return back()->withErrors(['email' => 'Неверные учетные данные.']);
    }

    // Выход из системы
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Вы вышли из системы.');
    }

    // Отправка ссылки для сброса пароля
    public function sendResetLink(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink($request->only('email'));

        return $status === Password::RESET_LINK_SENT 
                    ? back()->with(['status' => __($status)]) 
                    : back()->withErrors(['email' => __($status)]);
    }

    // Сброс пароля
    public function reset(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Найти пользователя по email и обновить пароль.
        $status = Password::reset(
            $request->only(['email', 'password', 'password_confirmation', 'token']),
            function ($user) use ($request) {
                $user->forceFill([
                    'password' => Hash::make($request->password),
                ])->save();
            }
        );

        
         return $status === Password::PASSWORD_RESET 
                    ? redirect()->route('login')->with(['success' => __('Пароль успешно сброшен.')]) 
                    : back()->withErrors(['email' => __($status)]);
    }
}