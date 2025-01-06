<?php declare(strict_types=1);

namespace Core\Common\User\Presentation\Controller\Api\V1\Destroy;

use Core\Shared\Presentation\Controller\Controller;
use Core\Common\User\Application\Command\DeleteUserCommand;
use Core\Common\User\Presentation\Request\DestroyUserRequest;
use Spatie\RouteAttributes\Attributes\Prefix;
use Spatie\RouteAttributes\Attributes\Middleware;
use Spatie\RouteAttributes\Attributes\Delete;
use Spatie\RouteAttributes\Attributes\WhereUuid;
use Core\Shared\Presentation\Response\MessageResponse;
use Core\Shared\Domain\Contract\CommandBusContract;

#[Prefix(prefix: 'v1')]
#[WhereUuid(param: 'id')]
#[Middleware(middleware: 'auth:sanctum')]
final class DestroyUserAction extends Controller
{
	private readonly private(set) CommandBusContract $commandBus;

	public function __construct(CommandBusContract $commandBus)
	{
		$this->commandBus = $commandBus;
	}

	#[Delete(uri: '/users/{id}/destroy', name: 'api.v1.users.destroy')]
	public function __invoke(
		string $id, DestroyUserRequest $request): MessageResponse
	{
		$isDeleting = $this->commandBus->dispatch(
			command: DeleteUserCommand::fromRequest(
				request: $request
			)
		);

		return new DestroyUserResponder()->handle(result: $isDeleting);
	}
}
