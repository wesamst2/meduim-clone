<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    public function tags()
    {
        return $this->belongsToMany( Tag::class,
            'articles_tags',
            'article_id',
            'tag_id');
    }

    public function author()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
