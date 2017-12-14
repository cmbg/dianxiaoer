<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class good extends Model
{
    // 定义 表名
    public $table = 'goods';
    //定义主键
    public  $primaryKey  = 'gid';

    //定义时间戳
    public $timestamps = false;

    //设置允许批量修改
//    public $fillable = [];
    //不允许字段
    public $guarded  = [];

    public function gpicinfo(){
        //1) 要关联的模型 2) 外键
        return $this -> hasOne('App\Http\Models\goodsdetail','gid','gid');
    }
    public function gpic(){
        //1) 要关联的模型 2) 外键
        return $this -> hasMany('App\Http\Models\gpic','gid','gid');
    }
    public function fishpond(){
        return $this ->belongsTo('App\Http\Models\Fishpond','fid','id');
    }
    public function Cate(){
        return $this -> belongsTo('App\Http\Models\Cate','tid','cate_id');
    }

}
