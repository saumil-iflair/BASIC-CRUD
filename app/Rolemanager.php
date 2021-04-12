<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rolemanager extends Model
{
    //
     protected $fillable=['role','status'];

    protected $table = 'rolemanagers';
}
