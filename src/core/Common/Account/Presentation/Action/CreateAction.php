<?php declare(strict_types=1);

namespace Core\Common\Account\Presentation\Action;

use Core\Common\Account\Presentation\Responder\CreateResponder;
use Core\Shared\Infrastructure\Illuminate\Controller;

final class CreateAction extends Controller
{
    public function __invoke(): CreateResponder
    {
        return new CreateResponder(data: []);
    }
}
