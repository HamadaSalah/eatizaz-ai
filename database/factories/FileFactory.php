<?php

namespace Database\Factories;

use App\Models\File;
use App\Models\FileInformation;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\File>
 */
class FileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'file_info_id' => FileInformation::factory(),
            'path' => $this->faker->url(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
