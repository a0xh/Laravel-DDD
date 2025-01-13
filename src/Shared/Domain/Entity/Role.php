<?php declare(strict_types=1);

namespace Core\Shared\Domain\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Core\Shared\Domain\Aggregate\AggregateRoot;
use Core\Shared\Domain\ValueObject\Role\RoleId;
use Core\Shared\Domain\ValueObject\Role\Slug;

#[ORM\Entity]
#[ORM\Table(name: 'roles')]
final class Role extends AggregateRoot
{
    #[ORM\Id]
    #[ORM\Column(name: 'id', type: 'role_id')]
    private private(set) RoleId $id;

    #[ORM\Column(name: 'name', type: 'string', length: 18)]
    private private(set) string $name;

    #[ORM\Embedded(class: Slug::class, columnPrefix: false)]
    private private(set) Slug $slug;

    #[ORM\Column(name: 'created_at', type: 'datetime_immutable')]
    private private(set) \DateTimeImmutable $createdAt;

    #[ORM\Column(name: 'updated_at', type: 'datetime_immutable')]
    private private(set) \DateTimeImmutable $updatedAt;

    #[ORM\ManyToMany(targetEntity: User::class, mappedBy: 'roles')]
    private private(set) Collection $users;

    public function __construct(string $name, Slug $slug)
    {
        $this->id = RoleId::generate();

        $this->name = $name;
        $this->slug = $slug;

        $this->createdAt = new \DateTimeImmutable(
            datetime: 'now',
            timezone: new \DateTimeZone(timezone: 'UTC')
        );

        $this->updatedAt = new \DateTimeImmutable(
            datetime: 'now',
            timezone: new \DateTimeZone(timezone: 'UTC')
        );

        $this->users = new ArrayCollection();
    }

    public function getId(): RoleId
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getSlug(): Slug
    {
        return $this->slug;
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

    public function getUsers(): Collection
    {
        return $this->users;
    }
    
    public function addUser(User $user): void
    {
        if (!$this->users->contains($user)) {
            $this->users->add($user);
            if (!$user->getRoles()->contains($this)) {
                $user->addRole($this);
            }
        }
    }

    public function removeUser(User $user): void
    {
        if ($this->users->contains($user)) {
            $this->users->removeElement($user);
            if ($user->getRoles()->contains($this)) {
                $user->removeRole($this);
            }
        }
    }
}
