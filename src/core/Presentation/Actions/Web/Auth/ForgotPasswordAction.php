<?php

namespace Core\Presentation\Actions\Web\Auth;

use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as Action;

class ForgotPasswordAction extends Action
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Action
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use AuthorizesRequests, ValidatesRequests, SendsPasswordResetEmails;
}
