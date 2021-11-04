<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'date' => $this->faker->date(),
            'title' => $this->faker->sentence(),
            'body' => $this->faker->text(),
            'social_media_id' => rand(1,2),
            'link' => $this->faker->url(),
            'user_id' => User::factory(),
        ];
    }
}

