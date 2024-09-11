<?php declare(strict_types=1);

namespace Core\Web\Shared\Presentation\Responders;

use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\{RedirectResponse, Response};
use Illuminate\Support\Facades\Session;

final readonly class RedirectResponder implements Responsable
{
    private string $url;
    private int $status = Response::HTTP_OK;
    private array $headers = [];

    public function __construct(string $url, int $status, array $headers)
    {
        $this->status = $status;
        $this->headers = $headers;
        $this->url = $url;
    }

    public function toResponse($request): RedirectResponse
    {
        return new RedirectResponse(
            url: $this->url,
            status: Response::HTTP_FOUND,
            headers: $this->headers
        );
    }
}
