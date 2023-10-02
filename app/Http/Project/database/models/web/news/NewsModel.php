<?php

namespace App\Http\Project\database\models\web\news;

use App\Http\Project\database\models\OModel;
use App\Http\Project\database\factories\web\news\NewsModelFactory;

class NewsModel extends OModel
{
    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return NewsModelFactory::new();
    }
    protected $table = 'web_news';
    public $tableLocales = NewsLocalesModel::class;
    public $localesFields = ['title', 'description', 'author', 'slug'];
}
