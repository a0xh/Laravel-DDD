<?php

namespace Core\Presentation\Actions\Web\Auth;

use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Routing\Controller as Action;

class ResetPasswordAction extends Action
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Action
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use AuthorizesRequests, ValidatesRequests, ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/home';
}
