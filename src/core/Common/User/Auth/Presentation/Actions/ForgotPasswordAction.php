<?php declare(strict_types=1);

namespace Core\Common\User\Auth\Presentation\Actions;

use Core\Shared\Presentation\Actions\Action;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

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

    use SendsPasswordResetEmails;
}
