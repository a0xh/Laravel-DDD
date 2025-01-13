<?php declare(strict_types=1);

namespace Core\User\Controller\Api\V1\Show;

use Core\Shared\Presentation\Controller\Controller;
use Core\Common\User\Application\Query\GetByIdQuery;
use Spatie\RouteAttributes\Attributes\Prefix;
use Spatie\RouteAttributes\Attributes\Middleware;
use Spatie\RouteAttributes\Attributes\Get;
use Spatie\RouteAttributes\Attributes\WhereUuid;
use Core\Shared\Presentation\Response\ResourceResponse;
use Core\Shared\Domain\Contract\QueryBusContract;

#[Prefix(prefix: 'v1')]
#[WhereUuid(param: 'id')]
#[Middleware(middleware: 'auth:sanctum')]
final class ShowAction extends Controller
{
	private readonly private(set) QueryBusContract $queryBus;

	public function __construct(QueryBusContract $queryBus)
	{
		$this->queryBus = $queryBus;
	}

	#[Get(uri: '/users/{id}/show', name: 'api.v1.users.show')]
	public function __invoke(string $id): ResourceResponse
	{
		return new ShowResponder()->handle(
			user: $this->queryBus->ask(
				query: new GetByIdQuery(userId: $id)
			)
		);
	}
}
