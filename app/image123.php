<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\img_master;

class image123 extends Model
{
    //
    public function child()
    {
        return $this->belongsTo(img_master::class);
    }
}
