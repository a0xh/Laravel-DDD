<?php declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Core\Shared\Infrastructure\Eloquents\Role;

class RoleTableSeeder extends Seeder
{
    public function __construct(
        private readonly Role $role
    ) {}

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->role->query()->create(
            attributes: [
                'name' => 'Admin',
                'description' => 'Администратор',
                'slug' => 'admin'
            ]
        )->saveOrFail(
            options: []
        );

        $this->role->factory()->count(
            count: 15
        )->create();
    }
}
