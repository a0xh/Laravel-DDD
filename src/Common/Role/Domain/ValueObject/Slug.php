<?php declare(strict_types=1);

namespace Core\Common\Role\Domain\ValueObject;

use Doctrine\ORM\Mapping as ORM;
use Core\Shared\Domain\ValueObject\BaseSlug;
use Illuminate\Support\Str;

#[ORM\Embeddable]
final class Slug extends BaseSlug
{
    #[ORM\Column(name: 'slug', type: 'string', length: 17)]
    protected protected(set) string $slug;

    protected function generate(string $slug): string
    {
        return Str::slug(
            title: $slug, separator: '-', language: 'en'
        );
    }
    
    public function jsonSerialize(): string
    {
        return $this->value();
    }
}
