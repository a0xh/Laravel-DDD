<?php declare(strict_types=1);

namespace Core\Common\Account\Presentation\Controller;

use Core\Shared\Infrastructure\Illuminate\Controller;
use Illuminate\Support\Facades\View;
use Core\Shared\Domain\ValueObject\User\UserId;

final class EditController extends Controller
{

    public function __invoke(string $id): \Illuminate\View\View
    {
        return View::make(view: 'admin.users.edit',
            data: []
        );
    }
}
