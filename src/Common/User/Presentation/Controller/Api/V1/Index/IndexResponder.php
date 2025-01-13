<?php declare(strict_types=1);

namespace Core\User\Controller\Api\V1\Index;

use Core\Shared\Presentation\Response\ResourceResponse;
use Core\Common\User\Presentation\Resource\IndexResource;
use Illuminate\Http\Response;

final readonly class IndexResponder
{
	public function handle(?array $users): ResourceResponse
	{
		if ($users !== null) {
			return new ResourceResponse(
				data: IndexResource::collection(resource: $users),
				status: Response::HTTP_OK
			);
		}

		return new ResourceResponse(
			data: ['message' => __('Users Are Absent.')],
			status: Response::HTTP_NOT_FOUND
		);
	}
}
