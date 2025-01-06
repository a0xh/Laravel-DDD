<?php declare(strict_types=1);

namespace Core\Common\User\Presentation\Controller\Api\V1\Index;

use Core\Shared\Presentation\Response\ResourceResponse;
use Core\Common\User\Presentation\Resource\IndexUserResource;

final readonly class IndexUserResponder
{
	public function handle(?array $users): ResourceResponse
	{
		if ($users !== null) {
			return new ResourceResponse(
				data: IndexUserResource::collection(resource: $users)
			);
		}

		return new ResourceResponse(data: [
            'message' => __('Users Are Absent.')
        ]);
	}
}
