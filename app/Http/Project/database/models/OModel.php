<?php

namespace App\Http\Project\database\models;

use App\Http\Project\database\models\api\FilesStoragesModel;
use App\Http\Project\database\models\api\ImagesStoragesModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Project\database\models\api\images\ImagesModel;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Concerns\HasUlids;

/**
 * OModel class
 *
 * @property int $id
 * @property int $sequence
 * @property int $publish
 * @property int $created_at_user
 * @property int $updated_at_user
 * @property \Carbon\Traits\Timestamp $created_at
 * @property \Carbon\Traits\Timestamp $updated_at
 *
 * @property string $name
 * @property string $name2
 * @property string $surname
 * @property string $tableLocales
 * @property string $title
 * @property string $description
 * @property string $keywords
 * @property int $lang_id
 */
class OModel extends Model
{
    use HasFactory, HasUlids;

    /**
     * @var string
     */
    public $tableLocales;

    /**
     * @var array
     */
    public $localesFields = [];

    /**
     * @var int
     */
    public $lang_id;

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'created_at' => 'datetime:d.m.Y h:s',
        'updated_at' => 'datetime:d.m.Y h:s',
    ];

    // protected static function booted()
    // {
    //     static::addGlobalScope(new LocaleGlobalScope);
    // }

    /**
     * Local Scope published
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return void
     */
    public function scopePublished($query)
    {
        $query->where('publish', 1);
    }

    /**
     * Local Scope ordered
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return void
     */
    public function scopeOrdered($query)
    {
        $query->orderBy('sequence');
    }

    /**
     * Local Scope withLocale
     *
     * @param \Illuminate\Database\Eloquent\Builder  $query
     * @param int $lang_id
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeWithLocale($query, $lang_id)
    {
        if (count($this->localesFields) > 0) {
            foreach ($this->localesFields as $field) {
                // $query->addSelect([
                //     $field => $this->tableLocales::select($field)
                //         ->whereColumn('foreign_id', $this->getTable() . '.id')
                //         ->where('lang_id', $this->lang_id ?  $this->lang_id : $lang_id)
                // ]);


            }
        }
        return $query;
    }

    /**
     * Local Scope whereSlug
     *
     * @param \Illuminate\Database\Eloquent\Builder  $query
     * @param string $slug
     * @return void
     */
    public function scopeWhereSlug($query, $slug)
    {
        $query->whereHas('locales', function (Builder $query) use ($slug) {
            $query->where('slug', $slug)->where('lang_id', config('app.lang_id'));
        });
    }

    /**
     * Accessor fullname
     *
     * @return string
     */
    public function getFullNameAttribute()
    {
        return ($this->name2 != '') ? $this->name . ' ' . $this->name2 . ' ' . $this->surname : $this->name . ' ' . $this->surname;
    }

    /**
     * Accessor dateFormat
     *
     * @param  string  $fieldName
     * @param  string  $format
     * @return string
     */
    public function dateFormat($fieldName, $format = "d.m.Y")
    {
        return isset($this->{$fieldName}) && $this->{$fieldName} != '' ? date($format, strtotime($this->{$fieldName})) : '';
    }

    /**
     * Accessor timeFormat
     *
     * @param  string  $fieldName
     * @param  string  $format
     * @return string
     */
    public function timeFormat($fieldName, $format = "H:i")
    {
        return isset($this->{$fieldName}) && $this->{$fieldName} != '' ? date($format, strtotime($this->{$fieldName})) : '';
    }

    /**
     * Accessor meta
     *
     * @return array
     */
    public function meta()
    {
        return [
            'title' => $this->title,
            'description' => $this->description ?? '',
            'keywords' => $this->keywords ?? ''
        ];
    }

    /**
     * Relation locales
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function locales()
    {
        return $this->hasMany($this->tableLocales, 'foreign_id', 'id');
    }

    public function locale()
    {
        return $this->hasOne($this->tableLocales, 'foreign_id', 'id')->where('lang_id', $this->lang_id ?  $this->lang_id : config('app.lang_id'));
    }

    public function getLocalesTable(){
        return (new $this->tableLocales)->getTable();
    }

    /**
     * Relation image
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function image()
    {
        return $this->hasOne(ImagesModel::class, 'id', 'image_id');
    }

    /**
     * Relation imagesStorage
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function imagesStorage()
    {
        return $this->hasOne(ImagesStoragesModel::class, 'id', 'images_storage_id');
    }

    /**
     * Relation filesStorage
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function filesStorage()
    {
        return $this->hasOne(FilesStoragesModel::class, 'id', 'files_storage_id');
    }
}
