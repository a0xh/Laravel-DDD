<?php declare(strict_types=1);

namespace Core\Shared\Infrastructure\Illuminate;

use Illuminate\Pipeline\Pipeline;

abstract class Process
{
    protected array $tasks = [];
 
    public function run(object $payload): mixed
    {
        return Pipeline::send(
            passable: $payload,
        )->through(
            pipes: $this->tasks,
        )->thenReturn();
    }
}