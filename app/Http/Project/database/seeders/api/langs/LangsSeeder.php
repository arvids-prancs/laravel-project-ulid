<?php

namespace App\Http\Project\database\seeders\api\langs;

use App\Http\Project\database\models\api\LangsModel;
use App\Models\User;

use Illuminate\Database\Seeder;

class LangsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $user = User::first();
        if ($file = file_get_contents(base_path('app/Http/Project/database/seeders/api/langs/api_langs.json'))) {
            $data = json_decode($file);
            foreach ($data as $item) {
                LangsModel::create([
                    'short' => $item->short,
                    'name' => $item->name,
                    'lang_code' => $item->lang_code,
                    'default_lang' => $item->default_lang,
                    'sequence' => $item->sequence,
                    'publish' => $item->publish,
                    'created_at_user' => $user->id,
                    'updated_at_user' => $user->id
                ]);
            }
        }
    }
}
