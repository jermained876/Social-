<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Model\Reply;
use App\Model\Category;
use Illuminate\Support\Str;

class Question extends Model
{
 // protected $guarded=[];
  protected $fillable =['title','slug','body','category_id'];

  protected static function boot()
  {
    parent::boot();

    static::creating(function($question){
      $question->slug = Str::slug($question->title, '-');
    });
  }


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
  return "/question/$this->slug";
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
