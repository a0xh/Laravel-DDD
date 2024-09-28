<?php declare(strict_types=1);

namespace Core\Common\Admin\Account\Domain\Contract;

use Core\Common\Admin\Account\Domain\Entity\UserEntity;

interface AggregateRoot
{
    public function user(): UserEntity;
    public function roles(): array;
}
