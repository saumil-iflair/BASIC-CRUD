<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class TestParent extends Model
{
    //
   protected $fillable = ['title'];

   protected  $table = 'testparent';

   public function child()
   {
   return $this->hasMany('App\TestChild', 'imgid', 'id');
   }

}
