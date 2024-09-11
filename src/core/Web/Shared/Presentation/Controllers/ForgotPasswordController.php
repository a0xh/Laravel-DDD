<?php declare(strict_types=1);

namespace Core\Web\Shared\Presentation\Controllers;

use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use AuthorizesRequests, ValidatesRequests, SendsPasswordResetEmails;

    public function showLinkRequestForm()
    {
        return view('admin.auth.passwords.email');
    }
}
