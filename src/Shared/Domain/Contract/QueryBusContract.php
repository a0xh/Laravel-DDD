<?php declare(strict_types=1);

namespace Core\Shared\Domain\Contract;

interface QueryBusContract
{
    public function ask(object $query): mixed;
    public function register(array $map): void;
}
