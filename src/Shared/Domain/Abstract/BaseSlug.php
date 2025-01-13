<?php declare(strict_types=1);

namespace Core\Shared\Domain\Abstract;

use Doctrine\ORM\Mapping as ORM;
use Illuminate\Support\Str;

#[ORM\MappedSuperclass]
abstract class BaseSlug implements \JsonSerializable
{
    protected string $slug;

    public function __construct(string $slug)
    {
        $this->slug = $this->generate(slug: $slug);
    }

    protected function generate(string $slug): string
    {
        return Str::slug(
            title: $slug, separator: '-', language: 'en'
        );
    }

    public static function fromString(string $slug): static
    {
        return new static(slug: $slug);
    }

    public function asString(): string
    {
        return $this->slug;
    }
    
    public function jsonSerialize(): string
    {
        return $this->asString();
    }

    public function __toString(): string
    {
        return $this->asString();
    }
}
