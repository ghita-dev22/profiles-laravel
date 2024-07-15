<?php

namespace Database\Factories;

use App\Models\Profile;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\profile>
 */
class ProfileFactory extends Factory
{
    protected static ?string $password;
      /**
     * Le modèle associé à la factory.
     *
     * @var string
     */
    protected $model = Profile::class;

    /**
     * Définir l'état par défaut du modèle.
     *
     * @return array<string, mixed>
     */

  
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'password' => static::$password ??= Hash::make('password'),
            'bio'=>fake()->text(),
            
       
        ];
    }
}
