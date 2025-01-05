<?php declare(strict_types=1);

namespace Database\Seeders;

use Core\Common\User\Domain\Entity\User;
use Core\Common\Role\Domain\Entity\Role;
use Database\Factories\UserFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Doctrine\ORM\EntityManagerInterface;
use Illuminate\Database\Seeder;

final class UserTableSeeder extends Seeder
{
    private readonly EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * Run the database seeds.
     */
    public function run(UserFactory $factory): void
    {
        $roles = $this->entityManager->getRepository(
            className: Role::class
        )->findAll();

        for ($i = 0; $i < 10; $i++) {
            $data = $factory->definition();

            $user = new User(
                firstName: $data['first_name'],
                lastName: $data['last_name'],
                patronymic: $data['patronymic'],
                phone: $data['phone'],
                email: $data['email'],
                password: $data['password'],
                isActive: $data['is_active']
            );

            $user->markEmailAsVerified();

            $user->setRememberToken(
                token: $data['remember_token']
            );

            if (!empty($roles)) {
                $random = $roles[
                    array_rand(array: $roles)
                ];

                $user->addRole(role: $random);
            }

            $this->entityManager->persist(object: $user);
        }

        $this->entityManager->flush();
    }
}
