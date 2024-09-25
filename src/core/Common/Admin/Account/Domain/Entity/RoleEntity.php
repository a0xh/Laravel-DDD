<?php declare(strict_types=1);

namespace Core\Common\Admin\Account\Domain\Entity;

use Core\Shared\Domain\ValueObject\Role\RoleId;
use Core\Shared\Domain\ValueObject\Role\Name;
use Core\Shared\Domain\ValueObject\Role\Slug;

final class RoleEntity
{
	public function __construct(
		private readonly RoleId $id,
		private readonly Name $name,
		private readonly Slug $slug,
	) {}

	public function getId(): RoleId
	{
		return $this->id;
	}

	public function getName(): Name
	{
		return $this->name;
	}

	public function getSlug(): Slug
	{
		return $this->slug;
	}
}
