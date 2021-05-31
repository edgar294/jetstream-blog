<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $randomUser = DB::table('users')
                ->inRandomOrder()
                ->first();

        // Generate a random date between 7 days ago and now
        $randomDate = $this->faker->dateTimeBetween('-7 days', 'now');

        return [
            'title' => $this->faker->sentence,
            'description' => $this->faker->text,
            'user_id' => $randomUser->id,
            'publication_date' => $randomDate,
        ];
    }
}
