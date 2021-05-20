<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'slug',
        'body',
        'excerpt',
        'user_id',
        'status'
    ];
  
    public function postCategory() {
        return $this->belongsToMany(Post::class);
    }
}
