<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $dob          = $this->faker->date;
        $explodedDate = explode('-', $dob);
        $icNumber     = Str::substr($explodedDate[0], -2).$explodedDate[1].$explodedDate[2].'-'.Str::padLeft($this->faker->numberBetween(01, 14), 2, '0').'-'.$this->faker->randomNumber(4, true);
        $age          = Carbon::parse($dob)->age;

        return [
            'full_name'     => $this->faker->name,
            'email'         => $this->faker->email,
            'ic_no'         => $icNumber,
            'date_of_birth' => $dob,
            'age'           => $age,
            'mobile_no'     => '+601'.$this->faker->numberBetween(0,9).$this->faker->randomNumber(rand(7,8), true),
            'phone_no'      => '+601'.$this->faker->numberBetween(0,9).$this->faker->randomNumber(rand(7,8), true),
            'state'         => $this->faker->city,
            'country_id'    => 131,
        ];
    }
}
