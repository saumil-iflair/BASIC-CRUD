<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TestChild extends Model
{
    //

    protected $fillable = ['imgid','imagename'];

    protected  $table = 'testchild';


}
