<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //设置表名
    public $table = 'order';
    public $primaryKey = 'oid';

    //设置日期时间格式
    public $dateFormat = 'U';

    //过滤默认的字段
    public $timestamps = false;

    //批量赋值属性
    public $guarded = ['_token'];

    //找关联用户表模型
    public function adminuser()
    {
        return $this->belongsTo('App\Http\Models\Adminuser','uid','uid');
    }

    //找关联详情表模型
    public function orderdetail()
    {
        return $this->belongsTo('App\Http\Models\OrderDetail','oid','oid');
    }
    public function goods()
    {
        //return 1111;
        return $this->belongsToMany('App\Http\Models\good','orderdetail','oid','gid');
//        return $this->hasManyThrough('App\Http\Models\good','orderdetail','oid','gid');
    }

}
