<?php declare(strict_types=1);

namespace Core\Auth\Controller\Web\Verify;

use Core\Shared\Presentation\Response\HttpResponse;
use Illuminate\Http\Response;

final readonly class VerifyResponder
{
	public function handle(bool $result): HttpResponse
	{
        return new HttpResponse(
            url: '/',
            status: Response::HTTP_FOUND
        );
	}
}
