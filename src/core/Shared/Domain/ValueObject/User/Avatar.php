<?php declare(strict_types=1);

namespace Core\Shared\Domain\ValueObject\User;

final class Avatar
{
    private readonly ?string $avatar;

    public function __construct(?string $value)
    {
        $this->avatar = $value;
    }

    public function value(): ?string
    {
        return $this->avatar;
    }
}
