<?php declare(strict_types=1);

namespace Core\Common\User\Presentation\Controller\Api\V1\Index;

use Core\Shared\Presentation\Controller\Controller;
use Core\Common\User\Application\Query\GetAllUsersQuery;
use Spatie\RouteAttributes\Attributes\Prefix;
use Spatie\RouteAttributes\Attributes\Middleware;
use Spatie\RouteAttributes\Attributes\Get;
use Spatie\RouteAttributes\Attributes\WhereUuid;
use Core\Shared\Presentation\Response\ResourceResponse;
use Core\Shared\Domain\Contract\QueryBusContract;

#[Prefix(prefix: 'v1')]
//#[Middleware(middleware: 'auth:sanctum')]
final class IndexUserAction extends Controller
{
	private readonly private(set) QueryBusContract $queryBus;

	public function __construct(QueryBusContract $queryBus)
	{
		$this->queryBus = $queryBus;
	}

	#[Get(uri: '/users', name: 'api.v1.users.index')]
	public function __invoke(): ResourceResponse
	{
		return new IndexUserResponder()->handle(
			users: $this->queryBus->ask(
				query: new GetAllUsersQuery()
			)
		);
	}
}
