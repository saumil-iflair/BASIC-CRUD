<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\img_master;

class img_child extends Model
{
    //
    // protected $table="img_child";
    // protected $fillable=['img_mstr_id','imagename',];

    public function child()
    {
        return $this->belongsTo(img_master::class);
    }
}
