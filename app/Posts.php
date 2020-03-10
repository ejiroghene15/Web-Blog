<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    protected $fillable = ['title', 'body', 'cat_id', 'author_id'];

    public function category()
    {
        return $this->belongsTo('App\Categories', 'cat_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'author_id');
    }

    public function comments()
    {
        return $this->hasMany('App\PostComments', 'post_id');
    }

    public function likes()
    {
        return $this->hasMany('App\PostLikes', 'post_id');
    }

    public function view()
    {
        return $this->hasMany('App\PostViews', 'post_id');
    }
    
    public function reaction()
    {
        return $this->hasMany('App\PostLikes', 'post_id');
    }
}
