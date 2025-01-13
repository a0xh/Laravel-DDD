<?php declare(strict_types=1);

namespace Core\Common\Auth\Application\Command;

use Core\Shared\Application\Command\Command;
use WendellAdriel\ValidatedDTO\Casting\StringCast;

final class VerifyCommand extends Command
{
    #[Cast(type: StringCast::class, param: null)]
    public public(set) string $expires;
    
    #[Cast(type: StringCast::class, param: null)]
    public public(set) string $userId;

    #[Cast(type: StringCast::class, param: null)]
    public public(set) string $signature;

    #[Cast(type: StringCast::class, param: null)]
    public public(set) string $hash;

    protected function mapData(): array
    {
        return ['id' => 'userId'];
    }
}
