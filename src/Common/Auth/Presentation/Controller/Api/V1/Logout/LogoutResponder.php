<?php declare(strict_types=1);

namespace Core\Auth\Controller\Api\V1\Logout;

use Core\Shared\Presentation\Response\MessageResponse;
use Illuminate\Http\Response;

final readonly class LogoutResponder
{
	public function handle(bool $result): MessageResponse
	{
        if ($result) {
            return new MessageResponse(
                message: 'You Have Successfully Logged Out!',
                status: Response::HTTP_NO_CONTENT
            );
        }
        
        return new MessageResponse(
            message: 'An Error Occurred While Processing The Logout.',
            status: Response::HTTP_UNAUTHORIZED
        );
	}
}
