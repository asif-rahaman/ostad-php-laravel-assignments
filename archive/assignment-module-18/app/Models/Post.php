<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
}
$post = new Post;
$post->user_id = 57;
$post->title = "New Post";
$post->slug = "new-post";
$post->excerpt = "Lorem ipsum";
$post->description = "New post description";
$post->is_published = true;
$post->min_to_read = 10;
$post->save();
