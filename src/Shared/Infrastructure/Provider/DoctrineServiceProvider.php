<?php declare(strict_types=1);

namespace Core\Shared\Infrastructure\Provider;

use Illuminate\Support\ServiceProvider;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\ORMSetup;
use Doctrine\DBAL\DriverManager;
use Doctrine\DBAL\Types\Type;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\DB;

final class DoctrineServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(
            abstract: EntityManagerInterface::class,
            concrete: function (Application $app): EntityManager {
                $config = ORMSetup::createAttributeMetadataConfiguration(
                    paths: config(key: 'doctrine.metadata_dirs'),
                    isDevMode: config(key: 'doctrine.dev_mode'),
                );

                $connection = DriverManager::getConnection(
                    params: config(key: 'doctrine.connection'),
                    config: $config
                );
                
                foreach (config(key: 'doctrine.custom_types') as $name => $class) {
                    if (!Type::hasType(name: $name)) {
                        Type::addType(name: $name, className: $class);
                    }
                }

                return new EntityManager(conn: $connection, config: $config);
            }
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        DB::connection()->getPdo()->exec("SET NAMES 'UTF8'");
    }
}