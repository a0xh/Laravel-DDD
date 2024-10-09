<?php declare(strict_types=1);

namespace Core\Common\Account\Presentation\Action;

use Core\Common\Account\Domain\Repository\RepositoryInterface;
use Core\Shared\Infrastructure\Illuminate\Controller;
use Core\Common\Account\Presentation\Responder\IndexResponder;

final class IndexAction extends Controller
{
    private readonly RepositoryInterface $repository;

    public function __construct(RepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(): IndexResponder
    {
        return new IndexResponder(data: [
            'users' => dd($this->repository->paginate(perPage: 10))
        ]);
    }
}
