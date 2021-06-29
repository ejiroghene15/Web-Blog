<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ForumMessages extends Model
{
    protected $fillable = ['subject', 'topic_id', 'user_id', 'body', 'date'];

    public $timestamps = false;

    protected $casts = [
        'date' => 'datetime'
    ];

    public function topic()
    {
        return $this->belongsTo('App\ForumTopics', 'topic_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
