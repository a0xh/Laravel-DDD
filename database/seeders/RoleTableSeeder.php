<?php declare(strict_types=1);

namespace Database\Seeders;

use Core\Shared\Domain\Entity\Role;
use Core\Shared\Domain\ValueObject\Role\Slug;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Doctrine\ORM\EntityManagerInterface;
use Illuminate\Database\Seeder;

final class RoleTableSeeder extends Seeder
{
    private readonly EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            'admin' => 'Администратор',
            'employee' => 'Сотрудник',
            'customer' => 'Заказчик',
            'participant' => 'Участник',
        ];

        foreach ($roles as $slug => $name) {
            $this->entityManager->persist(
                object: new Role(
                    name: $name,
                    slug: new Slug($slug),
                )
            );

            $this->entityManager->flush();
        }
    }
}