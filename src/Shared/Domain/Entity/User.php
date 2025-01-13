<?php declare(strict_types=1);

namespace Core\Shared\Domain\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Core\Shared\Domain\Aggregate\AggregateRoot;
use Core\Shared\Domain\ValueObject\User\UserId;
use Core\Shared\Domain\ValueObject\User\Email;
use Illuminate\Notifications\Notifiable;

#[ORM\Entity]
#[ORM\Table(name: 'users')]
final class User extends AggregateRoot
{
    use Notifiable;
    
    #[ORM\Id]
    #[ORM\Column(name: 'id', type: 'user_id')]
    private private(set) UserId $id;

    #[ORM\Column(name: 'first_name', type: 'string', length: 18)]
    private private(set) string $firstName;

    #[ORM\Column(name: 'last_name', type: 'string', length: 17)]
    private private(set) string $lastName;

    #[ORM\Column(name: 'patronymic', type: 'string', length: 19, nullable: true)]
    private private(set) ?string $patronymic;
    
    #[ORM\Column(name: 'phone', type: 'string', length: 20, unique: true, nullable: true)]
    private private(set) ?string $phone;

    #[ORM\Embedded(class: Email::class, columnPrefix: false)]
    private private(set) Email $email;

    #[ORM\Column(name: 'email_verified_at', type: 'datetime_immutable', nullable: true)]
    private private(set) ?\DateTimeImmutable $emailVerifiedAt;

    #[ORM\Column(name: 'remember_token', type: 'string', unique: true, nullable: true)]
    private private(set) ?string $rememberToken = null;

    #[ORM\Column(name: 'password', type: 'string', length: 255)]
    private private(set) string $password;

    #[ORM\Column(name: 'is_active', type: 'boolean')]
    private private(set) bool $isActive;

    #[ORM\Column(name: 'created_at', type: 'datetime_immutable')]
    private private(set) \DateTimeImmutable $createdAt;

    #[ORM\Column(name: 'updated_at', type: 'datetime_immutable')]
    private private(set) \DateTimeImmutable $updatedAt;

    #[ORM\ManyToMany(targetEntity: Role::class, inversedBy: 'users', fetch: 'EAGER')]
    #[ORM\JoinTable(name: 'role_user')]
    private private(set) Collection $roles;

    public function __construct(
        string $firstName,
        string $lastName,
        Email $email,
        string $password
    ) {
        $this->id = UserId::generate();

        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->password = $password;
        
        $this->isActive = true;

        $this->createdAt = new \DateTimeImmutable(
            datetime: 'now',
            timezone: new \DateTimeZone(timezone: 'UTC')
        );

        $this->updatedAt = new \DateTimeImmutable(
            datetime: 'now',
            timezone: new \DateTimeZone(timezone: 'UTC')
        );

        $this->roles = new ArrayCollection();
    }

    public function getId(): UserId
    {
        return $this->id;
    }
    
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): void
    {
        $this->firstName = $firstName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): void
    {
        $this->lastName = $lastName;
    }

    public function getPatronymic(): ?string
    {
        return $this->patronymic;
    }

    public function setPatronymic(?string $patronymic): void
    {
        $this->patronymic = $patronymic;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(?string $phone): void
    {
        $this->phone = $phone;
    }

    public function getEmail(): Email
    {
        return $this->email;
    }

    public function setEmail(Email $email): void
    {
        $this->email = $email;
    }

    public function getEmailVerifiedAt(): string
    {
        return $this->emailVerifiedAt->setTimezone(
            timezone: new \DateTimeZone(
                timezone: config(key: 'app.timezone')
            )
        )->format(format: 'Y-m-d\TH:i:sP');
    }

    public function hasVerifiedEmail(): bool
    {
        return $this->emailVerifiedAt !== null;
    }

    public function markEmailAsVerified(): void
    {
        $this->emailVerifiedAt = new \DateTimeImmutable(
            datetime: 'now',
            timezone: new \DateTimeZone(timezone: 'UTC')
        );
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    public function getStatus(): bool
    {
        return $this->isActive;
    }

    public function setStatus(bool $status): void
    {
        $this->isActive = $status;
    }

    public function getCreatedAt(): string
    {
        return $this->createdAt->setTimezone(
            timezone: new \DateTimeZone(
                timezone: config(key: 'app.timezone')
            )
        )->format(format: 'Y-m-d\TH:i:sP');
    }

    public function getUpdatedAt(): string
    {
        return $this->updatedAt->setTimezone(
            timezone: new \DateTimeZone(
                timezone: config(key: 'app.timezone')
            )
        )->format(format: 'Y-m-d\TH:i:sP');
    }

    public function setUpdatedAt(): string
    {
        $this->updatedAt = new \DateTimeImmutable(
            datetime: 'now',
            timezone: new \DateTimeZone(timezone: 'UTC')
        );
    }

    public function getRoles(): Collection
    {
        return $this->roles;
    }

    public function addRole(Role $role): void
    {
        if (!$this->roles->contains($role)) {
            $this->roles->add($role);
            $role->addUser(user: $this);
        }
    }

    public function removeRole(Role $role): void
    {
        if ($this->roles->contains($role)) {
            $this->roles->removeElement($role);
            $role->removeUser(user: $this);
        }
    }
}
