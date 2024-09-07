<?php declare(strict_types=1);

namespace Core\Common\User\Auth\Presentation\Actions;

use Core\Shared\Presentation\Actions\Action;
use Illuminate\Foundation\Auth\ResetsPasswords;

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

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/admin';
}
