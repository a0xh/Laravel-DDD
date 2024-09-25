<?php declare(strict_types=1);

namespace Core\Common\Admin\Account\Presentation\Controller\User;

use Core\Shared\Infrastructure\Illuminate\Controller;
use Core\Common\Admin\Account\Application\Service\UserService;
use Illuminate\Support\Facades\View;

final class IndexController extends Controller
{
    public function __construct(
        private readonly UserService $user
    ) {}

    public function __invoke(): \Illuminate\View\View
    {
        return View::make(view: 'admin.users.index',
            data: [
                'users' => $this->user->paginate()
            ]
        );
    }
}
