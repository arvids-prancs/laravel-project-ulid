<?php

namespace App\Http\Project\database\models\web\news;

use App\Http\Project\database\factories\web\news\NewsLocalesModelFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUlids;

/**
 * NewsLocalesModel class
 *
 * @property int $id
 * @property int $foreign_id
 * @property int $lang_id
 *
 * @property string $title
 * @property string $description
 * @property string $author
 * @property string $slug
 */
class NewsLocalesModel extends Model
{
    use HasFactory, HasUlids;

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return NewsLocalesModelFactory::new();
    }
    protected $table = 'web_news_locales';
    public $timestamps = false;
}
