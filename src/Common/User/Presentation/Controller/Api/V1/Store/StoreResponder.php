<?php declare(strict_types=1);

namespace Core\User\Controller\Api\V1\Store;

use Core\Shared\Presentation\Response\MessageResponse;
use Illuminate\Http\Response;

final readonly class StoreResponder
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
            message: 'An error occurred while adding the user.',
            status: Response::HTTP_INTERNAL_SERVER_ERROR
        );
	}
}
