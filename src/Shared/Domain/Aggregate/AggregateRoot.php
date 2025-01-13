<?php declare(strict_types=1);

namespace Core\Shared\Domain\Aggregate;

use Doctrine\ORM\Mapping as ORM;

#[ORM\MappedSuperclass]
abstract class AggregateRoot
{
    private private(set) array $events = [];

    abstract public function getId();

    protected function record(object $event): void
    {
        $this->events[] = $event;
    }

    public function release(): array
    {
        $events = $this->events;
        $this->events = [];

        return $events;
    }
}
