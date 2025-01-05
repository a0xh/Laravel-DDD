<?php declare(strict_types=1);

namespace Core\Common\User\Presentation\Controller\Api\V1\Store;

use Core\Shared\Presentation\Response\MessageResponse;
use Illuminate\Http\Response;

final readonly class StoreUserResponder
{
	public function handle(bool $result): MessageResponse
	{
		if ($result) {
			return new MessageResponse(
				message: 'User Successfully Added!',
				status: Response::HTTP_CREATED
			);
		}

		return new MessageResponse(
			message: 'An Error Occurred While Adding The User.',
			status: Response::HTTP_INTERNAL_SERVER_ERROR
		);
	}
}
