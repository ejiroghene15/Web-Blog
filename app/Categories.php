<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $fillable = ['category'];

    public function posts()
    {
        return $this->hasMany('App\Posts', 'cat_id');
    }
}
