<?php declare(strict_types=1);

namespace Core\Web\Common\User\Presentation\Actions\Knowledge;

use Core\Web\Shared\Presentation\Actions\Action;
use Illuminate\Support\Facades\View;

final class AgreementAction extends Action
{
    public function __invoke(): \Illuminate\View\View
    {
        return View::make(view: 'user.agreement', data: []);
    }
}
