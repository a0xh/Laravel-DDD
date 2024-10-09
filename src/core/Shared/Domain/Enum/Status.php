<?php declare(strict_types=1);

namespace Core\Shared\Domain\Enum;

enum Status: int
{
    case Active = 1;
    case Inactive = 0;
}
