<?php

namespace App\Http\Controllers\Admin;
use App\Http\Models\AdminUser;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminUserInfoAjaxController extends Controller
{

     /**
     * 切换是否允许登录的按钮,1为允许登录,2为注销
     *
     * @return \Illuminate\Http\Response
     */
    public function ajaxStatus(Request $request)
    {

        $id = $request->input('id');

        $data = AdminUser::find($id);
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
