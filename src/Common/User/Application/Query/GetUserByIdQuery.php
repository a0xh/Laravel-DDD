<?php declare(strict_types=1);

namespace Core\Common\User\Application\Query;

use Core\Common\User\Domain\ValueObject\UserId;

final class GetUserByIdQuery
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
