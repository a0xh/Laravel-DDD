<?php declare(strict_types=1);

namespace Core\Common\User\Application\Command;

use WendellAdriel\ValidatedDTO\SimpleDTO;
use WendellAdriel\ValidatedDTO\Concerns\EmptyCasts;
use WendellAdriel\ValidatedDTO\Casting\StringCast;
use WendellAdriel\ValidatedDTO\Attributes\Cast;
use Core\Common\User\Domain\ValueObject\UserId;

class DeleteUserCommand extends SimpleDTO
{
    use EmptyCasts;

    public public(set) string $id;

    protected function defaults(): array
    {
        return [
            'id' => new UserId(id: $this->id)
        ];
    }

    protected function casts(): array
    {
        return ['id' => new StringCast()];
    }
}
