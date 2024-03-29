<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\User;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'about' => '',
            'facebook' => '',
            'twitter' => '',
            'youtube' => '',
            'linkedin' => '',
            'email' => $this->faker->unique()->safeEmail,
            'email_verified_at' => now(),
            'password' => Hash::make('secret'), // secret
            'remember_token' => Str::random(10),
            'role_id' => 3,
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}
