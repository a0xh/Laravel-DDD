<?php declare(strict_types=1);

namespace Core\Common\User\Auth\Presentation\Actions;

use Core\Shared\Presentation\Actions\Action;
use Illuminate\Foundation\Auth\ConfirmsPasswords;

class ConfirmPasswordAction extends Action
{
    /*
    |--------------------------------------------------------------------------
    | Confirm Password Action
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password confirmations and
    | uses a simple trait to include the behavior. You're free to explore
    | this trait and override any functions that require customization.
    |
    */

    use ConfirmsPasswords;

    /**
     * Where to redirect users when the intended url fails.
     *
     * @var string
     */
    protected $redirectTo = '/admin';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
}
