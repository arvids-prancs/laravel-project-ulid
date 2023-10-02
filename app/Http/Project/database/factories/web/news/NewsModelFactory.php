<?php

namespace App\Http\Project\database\factories\web\news;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Http\Project\database\models\web\news\NewsModel;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Http\Project\database\models\web\news\NewsModel>
 */
class NewsModelFactory extends Factory
{

    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<\Illuminate\Database\Eloquent\Model>
     */
    protected $model = NewsModel::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'publish' => fake()->numberBetween(0, 1),
            'created_at' => fake()->dateTimeBetween('-2 month', 'now')
        ];
    }
}
