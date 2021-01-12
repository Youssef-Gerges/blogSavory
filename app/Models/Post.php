<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Te7aHoudini\LaravelTrix\Traits\HasTrixRichText;

class Post extends Model
{
    use HasFactory;
    use HasTrixRichText;
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'po_us_id', 'id');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'post_cats', 'post_id', 'cat_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'post_id', 'id');
    }

}
