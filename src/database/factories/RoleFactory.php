<?php declare(strict_types=1);

namespace Database\Factories;

use Core\Shared\Infrastructure\Eloquents\Role;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Role>
 */
class RoleFactory extends Factory
{
    protected $model = Role::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->unique()->jobTitle(),
            'slug' => fake()->unique()->slug(
                nbWords: 1,
                variableNbWords: true
            ),
            'description' => fake()->title(
                gender: null
            ),
        ];
    }
}
