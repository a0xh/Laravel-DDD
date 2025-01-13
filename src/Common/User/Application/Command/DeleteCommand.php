<?php declare(strict_types=1);

namespace Core\Common\User\Application\Command;

use Core\Shared\Application\Command\Command;
use WendellAdriel\ValidatedDTO\Casting\StringCast;

final class DeleteCommand extends Command
{
    public public(set) string $id;

    protected function defaults(): array
    {
        return ['id' => $this->id];
    }

    public function casts(): array
    {
        return [
            'id' => new StringCast()
        ];
    }
}
