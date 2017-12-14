<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //设置表名
    public $table = 'role';

    //设置主键
    public $primaryKey = 'id';

    //设置日期时间格式
    public $dateFormat = 'U';

    //过滤默认的字段
    public $timestamps = false;

    //批量赋值属性
    public $guarded = ['_token'];

    public function users()
    {
        return $this->belongsToMany('App\Http\Models\AdminUser','role_user','role_id','user_id');
    }

    public function permission()
    {
        return $this->belongsToMany(Permission::class,'role_permission','role_id','permission_id');
    }
}