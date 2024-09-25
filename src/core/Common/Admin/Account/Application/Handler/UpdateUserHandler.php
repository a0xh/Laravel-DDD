<?php declare(strict_types=1);

namespace Core\Common\Admin\Account\Application\Handler;

use Core\Common\Admin\Account\Application\Command\UpdateCommand;

final class UpdateUserHandler
{
    public function handle(string $id, UpdateCommand $command): bool
    {
        return $command;
    }
}