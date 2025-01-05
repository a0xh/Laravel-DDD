<?php declare(strict_types=1);

namespace Core\Shared\Application\Bus;

use Core\Shared\Domain\Contract\CommandBusContract;
use Illuminate\Bus\Dispatcher;

final class CommandBus implements CommandBusContract
{
    public function __construct(
        private private(set) Dispatcher $bus
    ) {}

    public function dispatch(object $command): mixed
    {
        return $this->bus->dispatch(command: $command);
    }

    public function register(array $map): void
    {
        $this->bus->map(map: $map);
    }
}
