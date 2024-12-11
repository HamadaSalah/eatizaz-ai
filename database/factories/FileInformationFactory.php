<?php

namespace Database\Factories;

use App\Models\FileInformation;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FileInformation>
 */
class FileInformationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = FileInformation::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'uuid' => Str::uuid()->toString(),
            'data' => $this->faker->randomElements([
                ['key' => 'value1'],
                ['key' => 'value2'],
            ], rand(1, 3)),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
