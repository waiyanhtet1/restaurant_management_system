<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class StaffFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'gender'=>$this->faker->gender(),
            'role'=>$this->faker->role(),
            'content'=>$this->faker->address(),
        ];
    }
}
