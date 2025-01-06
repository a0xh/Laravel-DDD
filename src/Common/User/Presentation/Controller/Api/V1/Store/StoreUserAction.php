<?php declare(strict_types=1);

namespace Core\Common\User\Presentation\Controller\Api\V1\Store;

use Core\Shared\Presentation\Controller\Controller;
use Core\Common\User\Application\Command\CreateUserCommand;
use Core\Common\User\Presentation\Request\StoreUserRequest;
use Spatie\RouteAttributes\Attributes\Prefix;
use Spatie\RouteAttributes\Attributes\Middleware;
use Spatie\RouteAttributes\Attributes\Post;
use Core\Shared\Presentation\Response\MessageResponse;
use Core\Shared\Domain\Contract\CommandBusContract;

#[Prefix(prefix: 'v1')]
#[Middleware(middleware: 'auth:sanctum')]
final class StoreUserAction extends Controller
{
	private readonly private(set) CommandBusContract $commandBus;

	public function __construct(CommandBusContract $commandBus)
	{
		$this->commandBus = $commandBus;
	}

	#[Post(uri: '/users/store', name: 'api.v1.users.store')]
	public function __invoke(StoreUserRequest $request): MessageResponse
	{
		$isCreated = $this->commandBus->dispatch(
			command: CreateUserCommand::fromRequest(
				request: $request
			)
		);

		return new StoreUserResponder()->handle(result: $isCreated);
	}
}
