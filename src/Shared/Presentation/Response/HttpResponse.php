<?php declare(strict_types=1);

namespace Core\Shared\Presentation\Response;

use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\RedirectResponse;

final class HttpResponse implements Responsable
{
    public function __construct(
        private readonly private(set) string $url,
        private readonly private(set) int $status
    ) {}

    public function toResponse($request): RedirectResponse
    {
        return new RedirectResponse(
            url: $this->url,
            status: $this->status,
            headers: []
        );
    }
}
