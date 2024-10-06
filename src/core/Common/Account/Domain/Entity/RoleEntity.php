<?php declare(strict_types=1);

namespace Core\Common\Account\Domain\Entity;

use Core\Common\Account\Domain\Exception\RoleValidationException;
use Core\Shared\Domain\ValueObject\Role\RoleId;
use Core\Shared\Domain\ValueObject\Role\Name;
use Core\Shared\Domain\ValueObject\Role\Description;
use Core\Shared\Domain\ValueObject\Role\Slug;
use Core\Shared\Domain\ValueObject\Role\Timestamp;

final class RoleEntity
{
    public function __construct(
        private readonly RoleId $id,
        private readonly Name $name,
        private readonly Description $description,
        private readonly Slug $slug,
        private readonly Timestamp $createdAt,
        private readonly Timestamp $updatedAt
    ) {
        $this->validate();
    }

    private function validate(): void
    {
        // Validate Name
        if (empty($this->name->value()) || strlen(string: $this->name->value()) > 44) {
            throw new RoleValidationException(
            	message: 'Name Must Not Be Empty And Must Be Less Than 44 Characters.'
            );
        }

        // Validate Description
        if (strlen(string: $this->description->value()) > 80) {
            throw new RoleValidationException(
            	message: 'Description Must Be Less Than 80 Characters.'
            );
        }

        // Validate Slug
        if (!preg_match(pattern: '/^[a-z0-9-]+$/', subject: $this->slug->value())) {
            throw new RoleValidationException(
            	message: 'Slug Must Be URL-friendly And Contain Only Lowercase Letters, Numbers, And Hyphens.'
            );
        }

        // Validate Timestamps
        if ($this->createdAt->value() > $this->updatedAt->value()) {
            throw new RoleValidationException(
            	message: 'CreatedAt Timestamp Must Not Be After UpdatedAt Timestamp.'
            );
        }
    }

    public function getId(): RoleId
    {
        return $this->id;
    }

    public function getName(): Name
    {
        return $this->name;
    }

    public function getDescription(): Description
    {
        return $this->description;
    }

    public function getSlug(): Slug
    {
        return $this->slug;
    }

    public function getCreatedAt(): Timestamp
    {
        return $this->createdAt;
    }

    public function getUpdatedAt(): Timestamp
    {
        return $this->updatedAt;
    }
    
    public function __toString(): string
    {
        return sprintf(
        	'RoleEntity(
	            id: %s,
	            name: %s,
	            description: %s,
	            slug: %s,
	            createdAt: %s,
	            updatedAt: %s
	        )',
	        $this->id->asString(),
	        $this->name->value(),
	        $this->description->value(),
	        $this->slug->value(),
	        $this->createdAt->value(),
	        $this->updatedAt->value()
        );
    }
}