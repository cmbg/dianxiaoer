<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class AdminUser extends Model
{
    //
    public $table = 'admin_users';
    public $primaryKey = 'uid';
    public $guarded = [];
    public $timestamps = false;
    /**
     * 通过用户模型查找关联的角色模型
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function role()
    {
        return $this->belongsToMany('App\Http\Models\Role','role_user','user_id','role_id');
    }

    public function permission()
    {
        return $this->belongsToMany(Permission::class,'role_permission','role_id','permission_id');
    }
    //关联用户详情模型
    public function userifo()
    {
        return $this->hasOne('App\Http\Model\UserInfo','uid','user_id');
    }

}
