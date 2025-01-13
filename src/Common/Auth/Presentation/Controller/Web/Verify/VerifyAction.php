<?php declare(strict_types=1);

namespace Core\Auth\Controller\Web\Verify;

use Core\Shared\Presentation\Controller\Controller;
use Core\Common\Auth\Application\Command\VerifyCommand;
use Core\Common\Auth\Presentation\Request\VerifyRequest;
use Spatie\RouteAttributes\Attributes\Prefix;
use Spatie\RouteAttributes\Attributes\Middleware;
use Spatie\RouteAttributes\Attributes\Get;
use Core\Shared\Presentation\Response\HttpResponse;
use Core\Shared\Domain\Contract\CommandBusContract;

#[Prefix(prefix: 'auth')]
#[Middleware(middleware: 'signed')]
final class VerifyAction extends Controller
{
	private readonly private(set) CommandBusContract $commandBus;

	public function __construct(CommandBusContract $commandBus)
	{
		$this->commandBus = $commandBus;
	}

	#[Get(uri: '/verify', name: 'auth.verify')]
	public function __invoke(VerifyRequest $request): HttpResponse
	{
		$isVerify = $this->commandBus->dispatch(
			command: VerifyCommand::fromRequest(request: $request)
		);

		return new VerifyResponder()->handle(result: $isVerify);
	}
}
