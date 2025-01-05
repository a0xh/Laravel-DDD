<?php declare(strict_types=1);

namespace Core\Shared\Domain\Contract;

interface CommandBusContract
{
    public function dispatch(object $command): mixed;
    public function register(array $map): void;
}
