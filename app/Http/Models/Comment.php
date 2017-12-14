<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public $table = 'message';
    public $primaryKey = 'id';
    public $guarded = [];
    public $timestamps = false;

    public function HomeUser(){
        return $this -> belongsTo('App\Http\Models\HomeUser','uid','uid');
    }

   public function good(){
        return $this -> belongsTo('App\Http\Models\good','gid','gid');
   }


}
