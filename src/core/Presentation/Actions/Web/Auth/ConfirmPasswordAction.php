<?php

namespace Core\Presentation\Actions\Web\Auth;

use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\ConfirmsPasswords;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Routing\Controller as Action;

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

    use AuthorizesRequests, ValidatesRequests, ConfirmsPasswords;

    /**
     * Where to redirect users when the intended url fails.
     *
     * @var string
     */
    protected $redirectTo = '/home';

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
