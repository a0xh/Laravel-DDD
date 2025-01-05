<?php declare(strict_types=1);

namespace Core\Common\User\Domain\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Core\Common\User\Domain\ValueObject\UserId;
use Core\Common\Role\Domain\Entity\Role;
use Carbon\Carbon;

#[ORM\Entity]
#[ORM\Table(name: 'users')]
final class User
{
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

    #[ORM\Column(name: 'email', type: 'string', length: 255, unique: true)]
    private private(set) string $email;

    #[ORM\Column(name: 'email_verified_at', type: 'datetime_immutable', nullable: true)]
    private private(set) ?\DateTimeImmutable $emailVerifiedAt = null;

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

    #[ORM\ManyToMany(targetEntity: Role::class, inversedBy: 'users')]
    #[ORM\JoinTable(name: 'role_user')]
    private private(set) Collection $roles;

    public function __construct(
        string $firstName,
        string $lastName,
        ?string $patronymic,
        ?string $phone,
        string $email,
        string $password,
        bool $isActive = true,
    ) {
        $this->id = UserId::generate();

        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->patronymic = $patronymic;
        $this->phone = $phone;
        $this->email = $email;
        $this->password = $password;

        $this->createdAt = new \DateTimeImmutable('now', new \DateTimeZone('UTC'));
        $this->updatedAt = new \DateTimeImmutable('now', new \DateTimeZone('UTC'));

        $this->isActive = $isActive;

        $this->roles = new ArrayCollection();
    }

    public function getId(): UserId
    {
        return $this->id;
    }

    public function getFristName(): string
    {
        return $this->firstName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
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

    public function getEmail(): string
    {
        return $this->email;
    }

    public function hasVerifiedEmail(): bool
    {
        return $this->emailVerifiedAt !== null;
    }

    public function markEmailAsVerified(): void
    {
        $this->emailVerifiedAt = new \DateTimeImmutable();
    }

    public function getIsActive(): bool
    {
        return $this->isActive;
    }

    public function setIsActive(bool $status): void
    {
        $this->isActive = $status;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    public function setRememberToken(?string $token): void
    {
        $this->rememberToken = $token;
    }

    public function getCreatedAt(): string
    {
        return $this->createdAt->setTimezone(new \DateTimeZone(config('app.timezone')))->format('Y-m-d\TH:i:sP');
    }

    public function getUpdatedAt(): string
    {
        return $this->updatedAt->setTimezone(new \DateTimeZone(config('app.timezone')))->format('Y-m-d\TH:i:sP');
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
