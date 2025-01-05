<?php declare(strict_types=1);

namespace Core\Common\Account\Presentation\Controller\User;

use Core\Shared\Infrastructure\Illuminate\Controller;
use Core\Common\Account\Infrastructure\Repository\UserQueryRepository;
use Spatie\RouteAttributes\Attributes\{Route, Prefix};

#[Prefix(prefix: 'v1')]
final class IndexAction extends Controller
{
	private private(set) UserQueryRepository $repository;

	public function __construct(UserQueryRepository $repository)
	{
		$this->repository = $repository;
	}

	#[Route(methods: 'get', uri: '/users', name: 'api.v1.users')]
	public function __invoke()
	{
		dd($this->repository->all());
	}
}
