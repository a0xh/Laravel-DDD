<?php declare(strict_types=1);

namespace Core\Shared\Domain\ValueObject\User;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Embeddable]
final class Email implements \JsonSerializable
{
    #[ORM\Column(name: 'email', type: 'string', length: 255, unique: true)]
    private private(set) string $email;

    public function __construct(string $email)
    {
        if (!$this->isValidEmail(email: $email)) {
            throw new \InvalidArgumentException(
                message: "Invalid Email Format: {$email}"
            );
        }
        
        $this->email = $email;
    }

    private function isValidEmail(string $email): bool
    {
        $validateEmail = filter_var(
            value: $email,
            filter: FILTER_VALIDATE_EMAIL
        );

        return $validateEmail !== false;
    }

    public static function fromString(string $email): self
    {
        return new self(email: $email);
    }

    public function asString(): string
    {
        return $this->email;
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
