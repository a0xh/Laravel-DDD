<?php declare(strict_types=1);

namespace Core\Shared\Domain\Factory;

interface FactoryInterface
{
	public static function create(array $attributes);
}