<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\carbon;

class Article extends Model
{
    /**
     * The attributes that are mass assignable
     *
     * @var array
     */
    protected $fillable = ['images', 'subject', 'url', 'snippet', 'is_publish'];

    /**
     * Mutator
     *
     * @param $url
     */
    public function setUrlAttribute($url)
    {
        $this->attributes['url'] = urlencode($url);
    }

    /**
     * Mutator : Parse publish_at as Carbon timestamp
     *
     * @param $date
     */
    public function setPublishAtAttribute($date) {

        $this->attributes['publish_at'] = Carbon::parse($date);

    }

    /**
     * Scope : only published articles
     *
     */

    public function scopePublished($query) {

        return $query->where('is_publish', 1);

    }

    /**
     * Get the tags associated with the articles
     *
     * @return mixed
     */
    public function tags() {

        return $this->belongsToMany('App\Tag')->withTimestamps();
    }

    public static function getMarkdownDirectory() {

        return 'markdown' . DIRECTORY_SEPARATOR;

    }

}
