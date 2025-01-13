<?php declare(strict_types=1);

namespace Core\Common\User\Application\Query;

use Core\Shared\Domain\ValueObject\User\UserId;

final class GetByIdQuery
{
    private readonly private(set) string $userId;

    public function __construct(string $userId)
    {
        $this->userId = $userId;
    }

    public function getId(): UserId
    {
        return UserId::fromString(id: $this->userId);
    }
}
