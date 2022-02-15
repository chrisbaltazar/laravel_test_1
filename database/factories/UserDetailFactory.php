<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class UserDetailFactory extends Factory
{

    public function definition()
    {
        return [
            'user_id'                => 1,
            'citizenship_country_id' => 1,
            'first_name'             => $this->faker->name,
            'last_name'              => $this->faker->lastName,
            'phone_number'           => $this->faker->phoneNumber,
        ];
    }

}
