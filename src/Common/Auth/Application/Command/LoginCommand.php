<?php declare(strict_types=1);

namespace Core\Common\Auth\Application\Command;

use Core\Shared\Application\Command\Command;
use WendellAdriel\ValidatedDTO\Casting\StringCast;
use WendellAdriel\ValidatedDTO\Attributes\Cast;

final class LoginCommand extends Command
{
    #[Cast(type: StringCast::class, param: null)]
    public public(set) string $email;

    #[Cast(type: StringCast::class, param: null)]
    public public(set) string $password;
}
