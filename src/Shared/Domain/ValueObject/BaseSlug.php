<?php declare(strict_types=1);

namespace Core\Shared\Domain\ValueObject;

abstract class BaseSlug implements \JsonSerializable
{
    protected protected(set) string $slug;

    public function __construct(string $value)
    {
        $this->slug = $this->generate(slug: $value);
    }

    abstract protected function generate(string $slug): string;

    public function asString(): string
    {
        return $this->slug;
    }

    public function __toString(): string
    {
        return $this->slug;
    }
}
