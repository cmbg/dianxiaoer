<?php

namespace App\Http\Controllers\Admin;
use App\Http\Models\AdminUser;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminUserInfoAjaxController extends CommonController
{
    /**
     * 切换普通管理员和超级管理员状态的按钮,0为普通管理员,1为超级管理员
     *
     * @return \Illuminate\Http\Response
     */
    public function ajaxIdentity(Request $request)
    {
        
        $id = $request->input('id');
        $data = AdminUser::find($id);
        if ($data->identity == 0) {
            $res = $data->update(['identity' => 1]);
            if ($res) {
                return ['identity'=>1];
            } else {
                return ['identity'=>0];
            }
        } else {
            $res = $data->update(['identity' => 0]);
            if ($res) {
                return ['identity'=>0];
            } else {
                return ['identity'=>1];
            }
        }
    }
     /**
     * 切换是否允许登录的按钮,0为允许登录,1为注销
     *
     * @return \Illuminate\Http\Response
     */
    public function ajaxStatus(Request $request)
    {

        $id = $request->input('id');
        $data = AdminUser::find($id);
        if ($data->status == 0) {
            $res = $data->update(['status' => 1]);
            if ($res) {
                return ['status'=>1];
            } else {
                return ['status'=>0];
            }
        } else {
            $res = $data->update(['status' => 0]);
            if ($res) {
                return ['status'=>0];
            } else {
                return ['status'=>1];
            }
        }
    }
}
