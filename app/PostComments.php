<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostComments extends Model
{
    public $timestamps = false;

    protected $fillable = ['comment', 'user_id', 'post_id', 'date'];

    protected $casts = [
        'date' => 'datetime'
    ];


    public function user()
    {
        return $this->belongsTo('App\User');
    }
}