<?php declare(strict_types=1);

namespace Core\Shared\Infrastructure\Illuminate;

use Illuminate\Foundation\Application as BaseApplication;

final class Application extends BaseApplication
{
	protected $namespace = 'Core';
}