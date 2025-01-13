<?php declare(strict_types=1);

namespace Core\Shared\Domain\ValueObject\Role;

use Doctrine\ORM\Mapping as ORM;
use Core\Shared\Domain\Abstract\BaseSlug;

#[ORM\Embeddable]
final class Slug extends BaseSlug
{
    #[ORM\Column(name: 'slug', type: 'string', length: 17, unique: true)]
    protected protected(set) string $slug;
}
