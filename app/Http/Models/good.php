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
}
