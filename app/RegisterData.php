<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RegisterData extends Model
{
    //
    protected $fillable=['name','email','phone','address'];

    protected $table = 'register_data';

}
