<?php declare(strict_types=1);

namespace Core\Shared\Application\Command;

use WendellAdriel\ValidatedDTO\SimpleDTO;
use WendellAdriel\ValidatedDTO\Concerns\EmptyCasts;

abstract class Command extends SimpleDTO
{
    use EmptyCasts;

    protected function defaults(): array
    {
        return [];
    }

    protected function casts(): array
    {
        return [];
    }
}
