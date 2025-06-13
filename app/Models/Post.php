<?php

namespace App\Models;


use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Post extends Model
{
    /** @use HasFactory<\Database\Factories\PostFactory> */
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'image',
        'video',
        'body',
        'published_at',
        'featured',
    ];

    protected function casts(): array
    {
        return [
            'published_at' => 'datetime'
        ];
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function likes()
    {
        return $this->belongsToMany(User::class, 'post_like')->withTimestamps();
    }


    public function scopePublished($query)
    {
        return $query->where('published_at', '<=', Carbon::now());
    }

    // Post.php
    public function scopeWithCategory($query, $slug)
    {
        return $query->whereHas('categories', fn($q) => $q->where('slug', $slug));
    }


    public function scopeFeatured($query)
    {
        return $query->where('featured', true);
    }

    public function getExcerpt()
    {
        return Str::limit(strip_tags($this->body), 150);
    }

    public function getReadingTime()
    {
        $mins = round(str_word_count($this->body) / 250);

        return ($mins < 1) ? 1 : $mins;
    }


    public function getThumbnailUrl()
    {
        $isUrl = str_contains($this->image, 'http');

        return ($isUrl) ? $this->image : Storage::disk('public')->url($this->image);
    }

    protected static function booted()
    {
        static::deleting(function ($post) {
            // Poista video, jos löytyy
            if ($post->video && Storage::disk('public')->exists($post->video)) {
                Storage::disk('public')->delete($post->video);
            }

            // Poista kuva, jos löytyy
            if ($post->image && Storage::disk('public')->exists($post->image)) {
                Storage::disk('public')->delete($post->image);
            }
        });

        static::updating(function ($post) {
            // Tarkistetaan, jos video vaihtuu
            if ($post->isDirty('video')) {
                $original = $post->getOriginal('video');
                if ($original && Storage::disk('public')->exists($original)) {
                    Storage::disk('public')->delete($original);
                }
            }

            // Tarkistetaan, jos kuva vaihtuu
            if ($post->isDirty('image')) {
                $original = $post->getOriginal('image');
                if ($original && Storage::disk('public')->exists($original)) {
                    Storage::disk('public')->delete($original);
                }
            }
        });
    }
}
