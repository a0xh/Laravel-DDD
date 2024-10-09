<?php declare(strict_types=1);

namespace Core\Common\Account\Presentation\Responder;

use Illuminate\Contracts\Support\Responsable;
use Illuminate\Support\Facades\View;

final class EditResponder implements Responsable
{
    private readonly array $data;

    public function __construct(array $data = [])
    {
        $this->data = $data;
    }

    public function toResponse($request): \Illuminate\View\View
    {
        return View::make(
            view: 'admin.users.edit',
            data: $this->data
        );
    }
}