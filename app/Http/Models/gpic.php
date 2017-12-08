<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class gpic extends Model
{
    //
    public $table = 'gpics';
    //定义主键
    public  $primaryKey  = 'id';

    //定义时间戳
    public $timestamps = false;

    //设置允许批量修改
    //public $fillable = [];
        //不允许字段
    public $guarded  = [];
    public function good()
    {
        return $this-> belongsTo('App\Http\Models\good','gid', 'id');
    }
}
