<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title', 'slug', 'status', 'content',
        'thumbnail', 'category_id', 'published_at', 'views'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function images()
    {
        return $this->hasMany(PostImage::class); // relasi gambar tambahan
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'post_tag'); // relasi tag
    }
}
