<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Core\Infrastructure\Models\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role = new Role();
        $role->name = 'Admin';
        $role->slug = 'admin';
        $role->description = 'Администратор';
        $role->save();

        Role::factory()->count(15)->create();
    }
}
