<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'body',
        'status',
        'author',
        'category',
        'tags',
    ];

    public static function booted()
    {
        static::saving(function (self $post) {
            $post->tags = json_encode($post->tags);
        });
    }

    public function tags(): Attribute
    {
        return Attribute::make(static fn($tags) => is_array($tags) ? $tags : json_decode($tags));
    }

    public function isRascunho()
    {
        return $this->status === 'draft';
    }

    public function users()
    {
        return $this->belongsToMany(User::class,  'post_like');
    }
}
