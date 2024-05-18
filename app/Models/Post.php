<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // protected $table = 'blog_posts';

    // protected $primarykey = 'post_id';

    protected $fillable = ['title', 'category', 'description', 'image', 'user_id'];

    // protected $guarded = [];
}
