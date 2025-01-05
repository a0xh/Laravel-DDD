<?php declare(strict_types=1);

namespace Core\Shared\Application\Bus;

use Core\Shared\Domain\Contract\QueryBusContract;
use Illuminate\Bus\Dispatcher;

final class QueryBus implements QueryBusContract
{
    public function __construct(
        private private(set) Dispatcher $bus
    ) {}

    public function ask(object $query): mixed
    {
        return $this->bus->dispatch(command: $query);
    }

    public function register(array $map): void
    {
        $this->bus->map(map: $map);
    }
}
