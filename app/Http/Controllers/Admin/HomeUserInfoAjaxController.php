<?php

namespace App\Http\Controllers\Admin;
use App\Http\Models\HomeUser;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomeUserInfoAjaxController extends CommonController
{
    /**
     * 切换普通管理员和超级管理员状态的按钮,0为普通用户,1为鱼塘塘主
     *
     * @return \Illuminate\Http\Response
     */
    public function ajaxIdentity(Request $request)
    {
        $id = $request->input('id');
        $data = HomeUser::find($id);
        if ($data->identity == 1) {
            $res = $data->update(['identity' => 2]);
            if ($res) {
                return ['identity'=>2];
            } else {
                return ['identity'=>1];
            }
        } else {
            $res = $data->update(['identity' => 1]);
            if ($res) {
                return ['identity'=>1];
            } else {
                return ['identity'=>2];
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
        $data = HomeUser::find($id);
        if ($data->status == 1) {
            $res = $data->update(['status' => 2]);
            if ($res) {
                return ['status'=>2];
            } else {
                return ['status'=>1];
            }
        } else {
            $res = $data->update(['status' => 1]);
            if ($res) {
                return ['status'=>1];
            } else {
                return ['status'=>2];
            }
        }
    }

   
}
