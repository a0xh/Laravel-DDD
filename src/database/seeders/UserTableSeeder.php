<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\{Str, Collection};
use Illuminate\Support\Facades\Hash;
use Core\Infrastructure\Models\{Role, User};

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = new User();
        $admin->avatar = null;
        $admin->first_name = 'Nobody';
        $admin->last_name = null;
        $admin->email = 'admin@mail.ru';
        $admin->email_verified_at = now();
        $admin->password = Hash::make(
            value: '#Admin1234#',
            options: []
        );
        $admin->status = true;
        $admin->remember_token = Str::random(
            length: 10
        );
        $admin->save();
        $admin->roles()->attach(
            id: Role::query()->where(
                column: 'slug',
                operator: '=',
                value: 'admin'
            )->first(),
            attributes: [],
            touch: true
        );

        User::factory()->count(count: 40)->create();

        $roles = Role::get(columns: ['id'])->all();

        User::all()->each(function ($user) use ($roles) { 
            $user->roles()->sync(
                ids: collect(
                    value: $roles
                )->random()->toArray()
            ); 
        });
    }
}
