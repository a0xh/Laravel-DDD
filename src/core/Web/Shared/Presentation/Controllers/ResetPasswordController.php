<?php declare(strict_types=1);

namespace Core\Web\Shared\Presentation\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
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
    protected $redirectTo = '/admin';

    public function showResetForm(Request $request)
    {
        $token = $request->route()->parameter('token');

        return view('admin.auth.passwords.reset')->with(
            ['token' => $token, 'email' => $request->email]
        );
    }
}
