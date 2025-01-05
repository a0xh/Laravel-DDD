<?php declare(strict_types=1);

namespace Core\Shared\Infrastructure\Type;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\Type;
use Core\Shared\Domain\ValueObject\BaseUuid;

abstract class UuidType extends Type
{
    abstract public function getValueObjectClass(): string;

    public function getSQLDeclaration(
        array $fieldDeclaration, AbstractPlatform $platform
    ): string {
        return 'UUID';
    }

    public function convertToPHPValue(
        mixed $value, AbstractPlatform $platform): ?BaseUuid
    {
        if ($value === null) {
            return null;
        }
        
        $valueObjectClass = $this->getValueObjectClass();
        
        return new $valueObjectClass($value);
    }

    public function convertToDatabaseValue(
        mixed $value, AbstractPlatform $platform): ?string
    {
        if ($value instanceof BaseUuid) {
            return (string) $value;
        }
        
        return null;
    }
}