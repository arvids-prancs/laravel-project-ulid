<?php

namespace App\Http\Project\database\models\api;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUlids;

/**
 * LangsModel class
 *
 * @property int $id
 * @property int $image_id
 * @property string $short
 * @property string $name
 * @property string $lang_code
 * @property string $icon
 * @property int $default_lang
 */
class LangsModel extends Model
{
    use HasFactory, HasUlids;
    protected $table = 'api_langs';
}
