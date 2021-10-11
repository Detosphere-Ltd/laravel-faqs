<?php

namespace DetosphereLtd\LaravelFaqs\Database\Factories;

use DetosphereLtd\LaravelFaqs\Models\Faq;
use Illuminate\Database\Eloquent\Factories\Factory;

class FaqFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Faq::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'question' => $this->faker->sentence(),
            'answer' => $this->faker->sentences(2, true),
            'type' => $this->faker->randomElement(['type-1', 'type-2']),
            'helpful_yes' => 0,
            'helpful_no' => 0,
        ];
    }
}
