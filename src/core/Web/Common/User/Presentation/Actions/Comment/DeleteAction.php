<?php declare(strict_types=1);

namespace Core\Web\Common\User\Presentation\Actions\Comment;

use Core\Web\Shared\Presentation\Actions\Action;
use Illuminate\Http\RedirectResponse;

final class DeleteAction extends Action
{
    public function __invoke(string $id): RedirectResponse
    {
        return dd($request->all());
    }
}
