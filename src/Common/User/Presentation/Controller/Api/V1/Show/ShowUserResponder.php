<?php declare(strict_types=1);

namespace Core\Common\User\Presentation\Controller\Api\V1\Show;

use Core\Shared\Presentation\Response\ResourceResponse;
use Core\Common\User\Domain\Entity\User;

final readonly class ShowUserResponder
{
	public function handle(?User $user): ResourceResponse
	{
		if ($user !== null) {
			return new ResourceResponse(
				data: new ShowUserResource(resource: $user)
			);
		}

		return new ResourceResponse(data: [
            'message' => __('User Not Found.')
        ]);
	}
}
