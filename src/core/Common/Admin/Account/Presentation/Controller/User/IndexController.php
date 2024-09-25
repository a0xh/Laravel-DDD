<?php declare(strict_types=1);

namespace Core\Common\Admin\Account\Presentation\Controller\User;

use Core\Shared\Infrastructure\Illuminate\Controller;
use Core\Common\Admin\Account\Application\Service\CollectionUserService;
use Illuminate\Support\Facades\View;

final class IndexController extends Controller
{
    public function __construct(
        private readonly CollectionUserService $test
    ) {}

    public function __invoke(): \Illuminate\View\View
    {
        return View::make(view: 'admin.users.index',
            data: [
                'users' => $this->test->all()
            ]
        );
    }
}
