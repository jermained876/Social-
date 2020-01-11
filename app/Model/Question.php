<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Model\Reply;
use App\Model\Category;

class Question extends Model
{
  protected $guarded=[];

  public function getRouteKeyName()
  {
    return 'slug';
  }
//  protected $with =['user'];

    public function user ()
    {
      return $this->belongsTo(User::class);
    }


public function getPathAttribute()
{
  return asset("api/question/$this->slug");
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
