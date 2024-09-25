<?php declare(strict_types=1);

namespace Core\Shared\Presentation\Response;

use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\{RedirectResponse, Response};
use Illuminate\Support\Facades\{Session, URL};

final class HttpResponder implements Responsable
{
    public function __construct(
        private readonly string $message,
        private readonly string $route
    ) {}

    public function toResponse($request): RedirectResponse
    {
        Session::flash(
            key: 'success', value: $this->message
        );

        return new RedirectResponse(
            url: URL::route(
                name: $this->route,
                parameters: [],
                absolute: false
            ),
            status: Response::HTTP_FOUND,
            headers: []
        );
    }
}
