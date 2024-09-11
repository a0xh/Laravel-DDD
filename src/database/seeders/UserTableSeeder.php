<?php declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Core\Web\Shared\Infrastructure\Models\{RoleModel, UserModel};
use Illuminate\Support\{Str, Collection};
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    public function __construct(
        private readonly RoleModel $role,
        private readonly UserModel $user
    ) {}

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->user->query()->create(
            attributes: [
                'avatar' => null,
                'first_name' => 'Nobody',
                'last_name' => null,
                'email' => 'admin@mail.ru',
                'email_verified_at' => now(),
                'password' => Hash::make(
                    value: '#Admin1234#',
                    options: []
                ),
                'remember_token' => Str::random(
                    length: 10
                ),
                'status' => true
            ]
        )->roles()->attach(
            id: $this->role->query()->where(
                column: 'slug',
                operator: '=',
                value: 'admin'
            )->first(),
            attributes: [],
            touch: true
        );

        $this->user->factory()->count(
            count: 40
        )->create();

        $this->user->all()->each(
            callback: function ($user): void { 
                $user->roles()->sync(
                    ids: collect(
                        value: $this->role->get(
                            columns: ['id']
                        )->all()
                    )->random()->toArray()
                );
            }
        );
    }
}
