<?php declare(strict_types=1);

namespace Core\Web\Common\User\Presentation\Actions\Comment;

use Core\Web\Shared\Presentation\Actions\Action;
use Illuminate\Http\{RedirectResponse, Request};

final class UpdateAction extends Action
{
    public function __invoke(string $id, Request $request): RedirectResponse
    {
        return dd($request->all());
    }
}
