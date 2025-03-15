<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\RealEstate;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RealEstate>
 */
class RealEstateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = RealEstate::class;

    public function definition()
    {
        $realStateType = $this->faker->randomElement(['house', 'department', 'land', 'commercial_ground']);
        return [
            'name' => $this->faker->company,
            'real_state_type' => $realStateType,
            'street' => $this->faker->streetName,
            'external_number' => $this->faker->buildingNumber,
            'internal_number' => $realStateType == 'department' || $realStateType == 'commercial_ground' ? $this->faker->bothify('??-###'): null,
            'neighborhood' => $this->faker->word,
            'city' => $this->faker->city,
            'country' => $this->faker->countryCode,
            'rooms' => $this->faker->numberBetween(1, 5),
            'bathrooms' => $realStateType == 'land' || $realStateType == 'commercial_ground' ? '0': $this->faker->randomFloat(1, 0, 5),
            'comments' => $this->faker->text(128),
        ];
    }
}
