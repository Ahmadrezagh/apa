<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Pishran\LaravelPersianSlug\HasPersianSlug;
use Spatie\Sluggable\SlugOptions;

class PostType extends Model
{
    use HasFactory;
    use HasPersianSlug;
    protected $fillable = [
        'name','slug'
    ];
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function getLinkAttribute()
    {
        return route('type.posts.index',$this->slug);
    }
}
