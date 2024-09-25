<?php declare(strict_types=1);

namespace Core\Common\Admin\Account\Presentation\Controller\User;

use Core\Shared\Infrastructure\Illuminate\Controller;
use Core\Common\Admin\Account\Application\Service\UserService;
use Illuminate\Support\Facades\View;
use Core\Shared\Domain\ValueObject\User\UserId;

final class EditController extends Controller
{
    public function __construct(
        private readonly UserService $user
    ) {}

    public function __invoke(string $id): \Illuminate\View\View
    {
        return View::make(view: 'admin.users.edit',
            data: [
                'user' => $this->user->find(
                    id: new UserId(value: $id)
                )
            ]
        );
    }
}
