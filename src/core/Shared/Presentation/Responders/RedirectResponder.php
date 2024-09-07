<?php declare(strict_types=1);

namespace Core\Shared\Presentation\Responders;

use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\{RedirectResponse, Response};
use Illuminate\Support\Facades\Session;

final readonly class RedirectResponder implements Responsable
{
    private string $url;

    public function __construct(string $url)
    {
        $this->url = $url;
    }

    public function toResponse($request): RedirectResponse
    {
        return new RedirectResponse(
            url: $this->url,
            status: Response::HTTP_FOUND,
            headers: []
        );
    }
}
