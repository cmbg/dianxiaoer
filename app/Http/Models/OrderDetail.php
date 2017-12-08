<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    //设置表名
    public $table = 'orderdetail';

    //设置日期时间格式
    public $dateFormat = 'U';

    //过滤默认的字段
    public $timestamps = false;

    //批量赋值属性
    public $guarded = ['_token'];

    //找关联商品表模型
    public function good()
    {
        return $this->belongsTo('App\Http\Models\good','gid','gid');
    }
}
