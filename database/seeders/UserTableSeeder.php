<?php declare(strict_types=1);

namespace Database\Seeders;

use Core\Shared\Domain\Entity\User;
use Core\Shared\Domain\Entity\Role;
use Database\Factories\UserFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Doctrine\ORM\EntityManagerInterface;
use Core\Shared\Domain\ValueObject\User\Email;
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
                email: new Email($data['email']),
                password: $data['password'],
            );

            $user->setPatronymic(patronymic: $data['patronymic']);
            $user->setPhone(phone: $data['phone']);
            $user->setStatus(status: $data['is_active']);

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
