<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ForumTopics extends Model
{
    protected $fillable = ['user_id', 'forum_id', 'subject', 'date'];

    public $timestamps = false;

    protected $casts = [
        'date' => 'datetime'
    ];

    public function messages()
    {
        return $this->hasMany('App\ForumMessages', 'topic_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
