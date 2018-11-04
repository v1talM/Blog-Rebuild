<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Category;
use Overtrue\Pinyin\Pinyin;

class Article extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'title','slug','excerpt','thumbnail','content','origin_content','category_id','read_count','reply_count',
        'is_recommened' , 'order','published_at', 'is_public'
    ];
    protected $dates = ['published_at'];
    /**
     * Article constructor.
     * @param $markdown
     */
    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        if (! $this->exists) {
            $this->attributes['slug'] = str_slug($value);
        }
    }
    public function setPublishedAtAttribute($date)
    {
        $this->attributes['published_at'] = Carbon::createFromFormat('Y-m-d H:i:s',$date);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
