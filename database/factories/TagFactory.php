<?php

namespace Database\Factories;

use App\Models\Education\Tag;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class TagFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Tag::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->title;
        return [
            't_name' => $name,
            't_slug' => Str::slug($name),
            't_title_seo' => $name
        ];
    }
}
