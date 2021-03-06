<?php

namespace App\Model;
use App\Model\Question;
use App\User;
use App\Model\Like;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
 // protected $guarded =[];
  
protected $fillable =['body'];

protected $with =['like'];

    public function question()
    {
      return $this->belongsTo(Question::class);
    }

    public function user ()
    {
      return $this->belongsTo(User::class);
    }

    public function like()
    {
      return $this->hasMany(Like::class);
    }

}
