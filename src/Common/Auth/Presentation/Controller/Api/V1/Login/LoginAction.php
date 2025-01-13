<?php declare(strict_types=1);

namespace Core\Auth\Controller\Api\V1\Login;

use Core\Shared\Presentation\Controller\Controller;
use Core\Common\Auth\Application\Command\LoginCommand;
use Core\Common\Auth\Presentation\Request\LoginRequest;
use Spatie\RouteAttributes\Attributes\{Prefix, Post};
use Core\Shared\Presentation\Response\TokenResponse;
use Core\Shared\Domain\Contract\CommandBusContract;

#[Prefix(prefix: 'v1')]
final class LoginAction extends Controller
{
	private readonly private(set) CommandBusContract $commandBus;

	public function __construct(CommandBusContract $commandBus)
	{
		$this->commandBus = $commandBus;
	}

	#[Post(uri: '/login', name: 'api.v1.login')]
	public function __invoke(LoginRequest $request): TokenResponse
	{
		$isLogin = $this->commandBus->dispatch(
			command: LoginCommand::fromRequest(request: $request)
		);

		return new LoginResponder()->handle(token: $isLogin);
	}
}
