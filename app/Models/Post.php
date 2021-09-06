<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Pishran\LaravelPersianSlug\HasPersianSlug;
use Spatie\Sluggable\SlugOptions;

class Post extends Model
{
    use HasFactory;
    use HasPersianSlug;
    protected $fillable = [
        'post_type_id','title','slug','text','image','view'
    ];
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    public function categories():BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }

    public function type()
    {
        return $this->belongsTo(PostType::class,'post_type_id','id');
    }

    public function tags():BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }

    public function getDateAttribute()
    {
        return \Morilog\Jalali\Jalalian::forge($this->created_at)->format('%A, %d %B %Y');
    }

    public function getLinkAttribute()
    {
        return route('type.posts.show',[$this->type->slug,$this->slug]);
    }
}
