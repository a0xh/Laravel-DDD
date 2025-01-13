<?php declare(strict_types=1);

namespace Core\Auth\Controller\Api\V1\Login;

use Core\Shared\Presentation\Response\TokenResponse;
use Illuminate\Http\Response;

final readonly class LoginResponder
{
	public function handle(?string $token): TokenResponse
	{
        if ($token !== null) {
            return new TokenResponse(
                message: 'Login Successful! Welcome Back!',
                token: $token,
                status: Response::HTTP_OK
            );
        }
        
        return new TokenResponse(
            message: 'Login Failed. Please Check Your Credentials And Try again.',
            status: Response::HTTP_UNAUTHORIZED
        );
	}
}
