<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Fishpond extends Model
{
    //设置表名
    public $table = 'fishpond';

    //设置主键
    public $primaryKey = 'id';

    //设置日期时间格式
    public $dateFormat = 'U';

    //过滤默认的字段
    public $timestamps = false;

    //批量赋值属性
    public $guarded = ['_token'];
    //设置关联~商品详情表
    public function good(){
        //1) 要关联的模型 2) 外键
        return $this -> hasMany('App\Http\Models\good','fid','id');
    }
}
