<?php

namespace App\Http\Project\database\factories\web\news;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Http\Project\database\models\web\news\NewsLocalesModel;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Http\Project\database\models\web\news\NewsLocalesModel>
 */
class NewsLocalesModelFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<\Illuminate\Database\Eloquent\Model>
     */
    protected $model = NewsLocalesModel::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->sentence(4);
        return [
            'title' => $title,
            //'description' => fake()->realText(1000),
            // 'author' => fake('lv_LV')->name(),
            'slug' => Str::slug($title)
        ];
    }
}
