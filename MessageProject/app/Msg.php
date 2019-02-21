<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Msg extends Model
{
     public function Reply(){
     return $this->hasMany('app\Reply','msgs_id');
     }
}
