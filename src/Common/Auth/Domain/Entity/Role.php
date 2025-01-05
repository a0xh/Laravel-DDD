<?php declare(strict_types=1);

namespace Core\Common\Account\Domain\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Core\Common\Account\Domain\ValueObject\RoleId;
use Core\Common\Account\Domain\Entity\User;

#[ORM\Entity]
#[ORM\Table(name: 'a0xh_roles')]
final class Role
{
    #[ORM\Id]
    #[ORM\Column(name: 'id', type: 'role_id')]
    private private(set) RoleId $id;

    #[ORM\Column(name: 'name', type: 'string', length: 18)]
    private private(set) string $name;

    #[ORM\Column(name: 'slug', type: 'string', length: 17)]
    private private(set) string $slug;

    #[ORM\Column(name: 'created_at', type: 'datetime_immutable')]
    private private(set) \DateTimeImmutable $createdAt;

    #[ORM\Column(name: 'updated_at', type: 'datetime_immutable')]
    private private(set) \DateTimeImmutable $updatedAt;

    #[ORM\ManyToMany(targetEntity: User::class, mappedBy: 'roles')]
    private private(set) Collection $users;

    public function __construct(string $name, string $slug)
    {
        $this->id = RoleId::generate();

        $this->name = $name;
        $this->slug = $slug;

        $this->createdAt = new \DateTimeImmutable();
        $this->updatedAt = new \DateTimeImmutable();

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

    public function getSlug(): string
    {
        return $this->slug;
    }

    public function getCreatedAt(): \DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function getUpdatedAt(): \DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function getUsers(): Collection
    {
        return $this->users;
    }
    
    public function addUser(User $user): void
    {
        if (!$this->users->contains($user)) {
            $this->users->add($user);
        }
    }

    public function removeUser(User $user): void
    {
        if ($this->users->contains($user)) {
            $this->users->removeElement($user);
        }
    }
}
