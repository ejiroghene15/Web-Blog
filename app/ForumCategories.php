<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ForumCategories extends Model
{
  public function forums()
  {
    return $this->hasMany("App\Forums", 'cat_id');
  }
}
