<?php declare(strict_types=1);

namespace Core\Web\Shared\Presentation\Responders;

use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

final readonly class XmlResponder implements Responsable
{
    public function __construct(
        private int $status = Response::HTTP_OK,
        private array $data,
        private array $headers = [
            'Content-Type' => 'application/json'
        ],
        private array $view
    ) {}

    public function toResponse($request): Response
    {
        return Response::make(
        	content: new ViewResponder(
        		view: $this->view,
        		data: $this->data,
                mergeData: []
        	),
            headers: $this->headers,
        	status: $this->status
        );
    }
}
