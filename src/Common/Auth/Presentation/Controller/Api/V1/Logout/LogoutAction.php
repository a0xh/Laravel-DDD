<?php declare(strict_types=1);

namespace Core\Auth\Controller\Api\V1\Logout;

use Core\Shared\Presentation\Controller\Controller;
use Core\Common\Auth\Application\Command\LogoutCommand;
use Core\Common\Auth\Presentation\Request\LogoutRequest;
use Spatie\RouteAttributes\Attributes\Prefix;
use Spatie\RouteAttributes\Attributes\Middleware;
use Spatie\RouteAttributes\Attributes\Post;
use Core\Shared\Presentation\Response\MessageResponse;
use Core\Shared\Domain\Contract\CommandBusContract;

#[Prefix(prefix: 'v1')]
#[Middleware(middleware: 'auth:sanctum')]
final class LogoutAction extends Controller
{
	private readonly private(set) CommandBusContract $commandBus;

	public function __construct(CommandBusContract $commandBus)
	{
		$this->commandBus = $commandBus;
	}

	#[Post(uri: '/logout', name: 'api.v1.logout')]
	public function __invoke(LogoutRequest $request): MessageResponse
	{
		$isLogout = $this->commandBus->dispatch(
			command: LogoutCommand::fromRequest(request: $request)
		);

		return new LogoutResponder()->handle(result: $isLogout);
	}
}
