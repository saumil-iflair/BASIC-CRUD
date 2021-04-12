<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\img_child;

class img_master extends Model
{
    //

    protected $fillable = ['title'];

    // public function master()
    // {
    //     return $this->hasMany(img_child::class);
    // }

    public function parent()
    {
    return $this->hasMany('App\img_child', 'img_id', 'id');
    }

}
