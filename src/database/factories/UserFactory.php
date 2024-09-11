<?php declare(strict_types=1);

namespace Database\Factories;

use Illuminate\Support\Facades\Hash;
use Core\Web\Shared\Infrastructure\Models\UserModel;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;
use Faker\Generator;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\Infrastructure\Models\User>
 */
class UserFactory extends Factory
{
    protected $model = UserModel::class;

    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'avatar' => UploadedFile::fake()->image(
                name: uniqid() . '.jpg',
                width: 50,
                height: 50
            )->store(
                path: 'images/' . date(
                    format: 'Y-m-d'
                ),
                options: []
            ),
            'first_name' => fake()->unique()->firstName(),
            'last_name' => fake()->unique()->lastName(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            //'phone' => fake()->unique()->phoneNumber(),
            'password' => static::$password ??= Hash::make(
                value: 'password',
                options: []
            ),
            'status' => fake()->boolean(
                chanceOfGettingTrue: 50
            ),
            'remember_token' => Str::random(
                length: 10
            ),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
