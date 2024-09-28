<?php declare(strict_types=1);

namespace Core\Common\Admin\Account\Domain\Entity;

use Core\Common\Admin\Account\Domain\ValueObject\Role\Uuid;
use Core\Common\Admin\Account\Domain\ValueObject\Role\Name;
use Core\Common\Admin\Account\Domain\ValueObject\Role\Slug;
use Core\Common\Admin\Account\Domain\Visitor\ValueRoleVisitor;

final class RoleEntity
{
	public function __construct(
		private readonly Uuid $uuid,
		private readonly Name $name,
		private readonly Slug $slug,
	) {}

	public function getUuid(): string
	{
		return $this->uuid->accept(
			visitor: new ValueRoleVisitor()
		);
	}

	public function getName(): string
	{
		return $this->name->accept(
			visitor: new ValueRoleVisitor()
		);
	}

	public function getSlug(): string
	{
		return $this->slug->accept(
			visitor: new ValueRoleVisitor()
		);
	}

	public function toArray(): array
	{
		return [
			'uuid' = $this->getUuid(),
			'name' = $this->getName(),
			'slug' = $this->getSlug(),
		];
	}
}
