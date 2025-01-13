<?php declare(strict_types=1);

namespace Core\User\Controller\Api\V1\Update;

use Core\Shared\Presentation\Response\MessageResponse;
use Illuminate\Http\Response;

final readonly class UpdateResponder
{
	public function handle(bool $result): MessageResponse
	{
		if ($result) {
			return new MessageResponse(
				message: 'User Successfully Updated!',
				status: Response::HTTP_OK
			);
		}

		return new MessageResponse(
			message: 'An Error Occurred While Updated The User.',
			status: Response::HTTP_INTERNAL_SERVER_ERROR
		);
	}
}
