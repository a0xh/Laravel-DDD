<?php declare(strict_types=1);

namespace Database\Factories;

use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
final class UserFactory extends Factory
{
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
        $areaCode = rand(min: 100, max: 999);
        $firstPart = rand(min: 100, max: 999);
        $secondPart = rand(min: 10, max: 99);
        $thirdPart = rand(min: 10, max: 99);

        $phoneNumber = sprintf('+7 (%d) %d-%d-%d', $areaCode, $firstPart, $secondPart, $thirdPart);

        return [
            'first_name' => fake()->unique()->firstName(),
            'last_name' => fake()->unique()->lastName(),
            'patronymic' => fake()->firstNameMale() . 'ович',
            'phone' => $phoneNumber,
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => new \DateTimeImmutable(),
            'is_active' => fake()->boolean(),
            'password' => Hash::make(
                value: Str::password(length: 18),
                options: []
            ),
            'remember_token' => Str::random(length: 80),
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
