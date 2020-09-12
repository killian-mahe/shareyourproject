<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Project;
use App\User;

class ProjectFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Project::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->company,
            'description' => $this->faker->text($maxNbChars = 150)
        ];
    }

    public function private()
    {
        return $this->state([
            'is_public' => false,
        ]);
    }

    public function with_owner()
    {
        return $this->state([
            'owner_id' => User::factory(),
        ]);
    }
}
