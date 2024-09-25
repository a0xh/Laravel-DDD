<?php declare(strict_types=1);

namespace Core\Shared\Domain\ValueObject\Role;

use Core\Shared\Domain\Contract\ValueObjectContract;

final class Slug implements ValueObjectContract
{
    private readonly string $slug;

    public function __construct(string $value)
    {
        $message = 'The Value Cannot Be Empty!';
        
        if (!filled(value: $value)) {
            throw new \InvalidArgumentException(
                message: $message
            );
        }

        $this->slug = $value;
    }

    public function value(): string
    {
        return $this->slug;
    }
}
