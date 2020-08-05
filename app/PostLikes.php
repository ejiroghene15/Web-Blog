<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostLikes extends Model
{
    public $timestamps = false;

    protected $fillable = ['user_id', 'post_id'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
