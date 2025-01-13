<?php declare(strict_types=1);

namespace Core\User\Controller\Api\V1\Update;

use Core\Shared\Presentation\Controller\Controller;
use Core\Common\User\Application\Command\UpdateCommand;
use Core\Common\User\Presentation\Request\UpdateRequest;
use Spatie\RouteAttributes\Attributes\Prefix;
use Spatie\RouteAttributes\Attributes\Middleware;
use Spatie\RouteAttributes\Attributes\Put;
use Spatie\RouteAttributes\Attributes\WhereUuid;
use Core\Shared\Presentation\Response\MessageResponse;
use Core\Shared\Domain\Contract\CommandBusContract;

#[Prefix(prefix: 'v1')]
#[WhereUuid(param: 'id')]
#[Middleware(middleware: 'auth:sanctum')]
final class UpdateAction extends Controller
{
	private readonly private(set) CommandBusContract $commandBus;

	public function __construct(CommandBusContract $commandBus)
	{
		$this->commandBus = $commandBus;
	}

	#[Put(uri: '/users/{id}/update', name: 'api.v1.users.update')]
	public function __invoke(
		string $id, UpdateRequest $request): MessageResponse
	{
		$isUpdated = $this->commandBus->dispatch(
			command: UpdateCommand::fromRequest(request: $request)
		);

		return new UpdateResponder()->handle(result: $isUpdated);
	}
}
