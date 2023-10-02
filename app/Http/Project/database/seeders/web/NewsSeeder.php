<?php

namespace App\Http\Project\Database\Seeders\Web;

use App\Http\Project\database\models\web\news\NewsModel;
use App\Models\User;
use App\Http\Project\database\models\api\LangsModel;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Sequence;


class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::first();
        $langs = LangsModel::orderBy('sequence')->get();
        for ($i = 1; $i <= 45; $i++) {
            $author = fake()->name();
            $sequence = [];
            foreach ($langs as $item) {
                $sequence[] = [
                    'lang_id' => $item->id,
                    'author' => $author,
                    'description' => fake($item->lang_code)->realText(1000)
                ];
            }
            $newsModel = NewsModel::factory()
                ->hasLocales(3, new Sequence(...$sequence))
                ->create([
                    'created_at_user' => $user->id,
                    'updated_at_user' => $user->id
                ]);
            //$newsModel->sequence = $newsModel->id;
            $newsModel->save();
        }
    }
}
