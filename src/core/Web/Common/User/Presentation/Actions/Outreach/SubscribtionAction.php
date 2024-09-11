<?php declare(strict_types=1);

namespace Core\Web\Common\User\Presentation\Actions\Outreach;

use Core\Web\Shared\Presentation\Actions\Action;
use Illuminate\Http\{RedirectResponse, Request};

final class SubscribtionAction extends Action
{
    public function __invoke(Request $request): RedirectResponse
    {
        return dd($request->all());
    }
}
