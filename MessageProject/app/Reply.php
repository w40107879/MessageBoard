<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
      protected $table = "replys";

      public function Msg(){
       return $this->belongsTo('app\Msg');
     }
}
