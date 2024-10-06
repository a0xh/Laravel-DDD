<?php declare(strict_types=1);

namespace Core\Common\Account\Domain\Entity;

use Core\Shared\Domain\ValueObject\User\UserId;
use Core\Shared\Domain\ValueObject\User\Avatar;
use Core\Shared\Domain\ValueObject\User\FirstName;
use Core\Shared\Domain\ValueObject\User\LastName;
use Core\Shared\Domain\ValueObject\User\Email;
use Core\Shared\Domain\ValueObject\User\Password;
use Core\Shared\Domain\ValueObject\User\Status;
use Core\Shared\Domain\ValueObject\User\Timestamp;

final class UserEntity
{
	public function __construct(
		private readonly UserId $id,
		private readonly Avatar $avatar,
		private readonly FirstName $firstName,
		private readonly LastName $lastName,
		private readonly Email $email,
		private readonly Password $password,
		private readonly Status $status,
		private readonly Timestamp $createdAt,
		private readonly Timestamp $updatedAt,
		private array $roles = []
	) {}

	public function getId(): UserId
	{
		return $this->id;
	}

	public function getAvatar(): Avatar
	{
		return $this->avatar;
	}

	public function getFirstName(): FirstName
	{
		return $this->firstName;
	}

	public function getLastName(): LastName
	{
		return $this->lastName;
	}

	public function getEmail(): Email
	{
		return $this->email;
	}

	public function getStatus(): Status
	{
		return $this->status;
	}

	public function getCreatedAt(): Timestamp
	{
		return $this->createdAt;
	}

	public function getUpdatedAt(): Timestamp
	{
		return $this->updatedAt;
	}

	public function setRoles(array $data): void
	{
        $this->roles = $data;
    }

	public function getRoles(): array
	{
		return $this->roles;
	}
}
