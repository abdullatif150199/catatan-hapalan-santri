<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Hapalan>
 */
class HapalanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => fake()->numberBetween(4,23),
            'hariTanggal' => fake()->date(),
            'surah' => fake()->randomElement([
                'Al-Fatihah',
                'Al-Baqarah',
                'Ali Imran',
                'An-Nisa',
                'Al-Maidah',
            ]),
            'ayat' => fake()->numberBetween(1, 286),
        ];
    }
}
