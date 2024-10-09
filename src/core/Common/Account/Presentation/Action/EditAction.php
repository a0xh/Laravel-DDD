<?php declare(strict_types=1);

namespace Core\Common\Account\Presentation\Action;

use Core\Common\Account\Domain\Repository\RepositoryInterface;
use Core\Shared\Infrastructure\Illuminate\Controller;
use Core\Common\Account\Presentation\Responder\EditResponder;
use Core\Shared\Domain\ValueObject\User\UserId;

final class EditAction extends Controller
{
    private readonly RepositoryInterface $repository;

    public function __construct(RepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(string $id): EditResponder
    {
        $uuid = UserId::fromString(value: $id);

        return new EditResponder(data: [
            'user' => $this->repository->find(id: $uuid)
        ]);
    }
}
