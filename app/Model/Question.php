<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Model\Reply;
use App\Model\Category;

class Question extends Model
{


    public function user ()
    {
      return $this->belongsTo(User::class);
    }

    public function reply()
  {
    return $this->hasMany(Reply::class);
  }
  public function category()
  {
    return belongsTo(Category::class);
  }

}
