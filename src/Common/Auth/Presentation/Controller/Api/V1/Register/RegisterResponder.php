<?php declare(strict_types=1);

namespace Core\Auth\Controller\Api\V1\Register;

use Core\Shared\Presentation\Response\MessageResponse;
use Illuminate\Http\Response;

final readonly class RegisterResponder
{
	public function handle(bool $result): MessageResponse
	{
        if ($result) {
            return new MessageResponse(
                message: 'Registration Was Successful!',
                status: Response::HTTP_CREATED
            );
        }
        
        return new MessageResponse(
            message: 'An Error Occurred While Processing The Registration.',
            status: Response::HTTP_INTERNAL_SERVER_ERROR
        );
	}
}
