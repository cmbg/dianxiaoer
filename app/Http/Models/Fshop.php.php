<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Fshop.php extends Model
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
}
