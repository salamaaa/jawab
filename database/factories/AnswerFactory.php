<?php

namespace Database\Factories;

use App\Models\Answer;
use App\Models\Question;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class AnswerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Answer::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id'=>User::pluck('id')->random(),
            'question_id'=>Question::pluck('id')->random(),
            'body'=>$this->faker->sentences(rand(5,8),true),
            'votes_count'=>rand(0,5),
        ];
    }
}
