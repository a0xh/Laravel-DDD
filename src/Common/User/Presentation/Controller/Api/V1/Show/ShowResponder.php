<?php declare(strict_types=1);

namespace Core\User\Controller\Api\V1\Show;

use Core\Shared\Domain\Entity\User;
use Core\Shared\Presentation\Response\ResourceResponse;
use Core\Common\User\Presentation\Resource\ShowResource;
use Illuminate\Http\Response;

final readonly class ShowResponder
{
	public function handle(?User $user): ResourceResponse
	{
		if ($user !== null) {
			return new ResourceResponse(
				data: new ShowResource(resource: $user),
				status: Response::HTTP_OK
			);
		}

		return new ResourceResponse(
			data: ['message' => __('User Not Found.')],
			status: Response::HTTP_NOT_FOUND
	    );
	}
}
