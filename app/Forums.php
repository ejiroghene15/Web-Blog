<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Forums extends Model
{
    protected $fillable = ['cat_id', 'name', 'description', 'created'];

    public function topics()
    {
        return $this->hasMany('App\ForumTopics', 'forum_id');
    }


}
