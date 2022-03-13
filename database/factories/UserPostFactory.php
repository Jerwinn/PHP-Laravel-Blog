<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserPostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'user_id' => User::all()->random(),
            'title' => $this->faker->sentence(),
            'content' => $this->faker->sentences(3, true),
            'date_posted'=>$this->faker->dateTimeThisYear(),
            'image' => $this->faker->image(),

        ];
    }
}
