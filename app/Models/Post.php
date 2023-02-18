<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'post_title',
        'post_content',
        'featured_image',
        'post_tags'
    ];

    public function postID() {
        return $this->belongsTo(Post::class, 'id');
    }

    // public function tags() {
    //     return $this->belongsTo(Post::class, 'post_tags');
    // }
}
