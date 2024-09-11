<?php declare(strict_types=1);

namespace Core\Web\Shared\Presentation\Responders;

use Illuminate\Contracts\Support\Responsable;
use Illuminate\Support\Facades\View;

final readonly class ViewResponder implements Responsable
{
    public function __construct(
        private string $view,
        private array $data = [],
        private array $mergeData = []
    ) {}

    public function toResponse($request): \Illuminate\View\View
    {
        return View::make(
            view: $this->view,
            data: $this->data,
            mergeData: $this->mergeData
        );
    }
}
