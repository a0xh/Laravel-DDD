<?php declare(strict_types=1);

namespace Core\Common\User\Domain\ValueObject;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Embeddable]
final class Email implements \JsonSerializable
{
    #[ORM\Column(name: 'email', type: 'string', length: 255, unique: true)]
    private readonly private(set) string $email;

    public function __construct(string $value)
    {
        if (!$this->isValidEmail(email: $value)) {
            throw new \InvalidArgumentException(
                message: "Invalid email format: {$value}"
            );
        }
        
        $this->email = $value;
    }

    private function isValidEmail(string $email): bool
    {
        $validateEmail = filter_var(
            value: $email,
            filter: FILTER_VALIDATE_EMAIL
        );

        return $validateEmail !== false;
    }

    public static function fromString(string $value): self
    {
        return new self(email: $value);
    }

    public function jsonSerialize(): string
    {
        return $this->email;
    }

    public function equals(Email $other): bool
    {
        return $this->email === $other->jsonSerialize();
    }

    public function asString(): string
    {
        return $this->jsonSerialize();
    }

    public function __toString(): string
    {
        return $this->asString();
    }
}