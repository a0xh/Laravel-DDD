<?php declare(strict_types=1);

namespace Core\Web\Common\User\Presentation\Actions\Comment;

use Core\Web\Shared\Presentation\Actions\Action;
use Illuminate\Http\{RedirectResponse, Request};

final class StoreAction extends Action
{
    public function __invoke(Request $request): RedirectResponse
    {
        return dd($request->all());
    }
}
