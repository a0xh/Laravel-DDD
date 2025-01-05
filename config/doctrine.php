<?php declare(strict_types=1);

use Ramsey\Uuid\Doctrine\UuidType;
use Core\Common\Role\Infrastructure\Type\RoleIdType;
use Core\Common\User\Infrastructure\Type\UserIdType;

return [
    'connection' => [
        'driver' => 'pdo_pgsql',
        'host' => env('DB_HOST', 'postgres'),
        'port' => env('DB_PORT', '5432'),
        'dbname' => env('DB_DATABASE', 'laravel'),
        'user' => env('DB_USERNAME', 'sail'),
        'password' => env('DB_PASSWORD', 'password'),
        'options' => [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ],
    ],
    'metadata_dirs' => [
        base_path(path: 'src/Common/Role/Domain/Entity'),
        base_path(path: 'src/Common/User/Domain/Entity'),
    ],
    'custom_types' => [
        UuidType::NAME => UuidType::class,
        RoleIdType::NAME => RoleIdType::class,
        UserIdType::NAME => UserIdType::class,
    ],
    'dev_mode' => true
];
