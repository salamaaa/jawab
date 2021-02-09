<?php

namespace Database\Factories;

use App\Models\Question;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class QuestionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Question::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id'=>User::factory(),
            'title'=>rtrim($this->faker->sentence(rand(4,10)),'.'),
            'body'=>$this->faker->paragraphs(rand(3,6),true),
            'views'=>rand(0,15),
            'answers'=>rand(0,10),
            'votes'=>rand(-4,10)
        ];
    }
}
