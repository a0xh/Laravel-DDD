<?php declare(strict_types=1);

namespace Core\Auth\Controller\Api\V1\Register;

use Core\Shared\Presentation\Controller\Controller;
use Core\Common\Auth\Application\Command\RegisterCommand;
use Core\Common\Auth\Presentation\Request\RegisterRequest;
use Spatie\RouteAttributes\Attributes\{Prefix, Post};
use Core\Shared\Presentation\Response\MessageResponse;
use Core\Shared\Domain\Contract\CommandBusContract;

#[Prefix(prefix: 'v1')]
final class RegisterAction extends Controller
{
	private readonly private(set) CommandBusContract $commandBus;

	public function __construct(CommandBusContract $commandBus)
	{
		$this->commandBus = $commandBus;
	}

	#[Post(uri: '/register', name: 'api.v1.register')]
	public function __invoke(RegisterRequest $request): MessageResponse
	{
		$isRegister = $this->commandBus->dispatch(
			command: RegisterCommand::fromRequest(request: $request)
		);

		return new RegisterResponder()->handle(result: $isRegister);
	}
}
