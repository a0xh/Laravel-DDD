<?php declare(strict_types=1);

namespace Core\Common\Account\Presentation\Controller;

use Core\Shared\Infrastructure\Illuminate\Controller;
use Core\Common\Account\Domain\Repository\RepositoryInterface;
use Illuminate\Support\Facades\View;

final class IndexController extends Controller
{
    public function __construct(
        private readonly RepositoryInterface $repository
    ) {}

    public function __invoke(): \Illuminate\View\View
    {
        return View::make(view: 'admin.users.index',
            data: [
                'users' => dd($this->repository->paginate(perPage: 10))
            ]
        );
    }
}
