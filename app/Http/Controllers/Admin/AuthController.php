<?php

namespace App\Http\Controllers\Admin;

use App\Http\Models\Comment;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AuthController extends CommonController
{
    /**
     * 没有权限显示视图
     */
    function auth(){

        return view('errors.auth', ['title' => '没有权限']);
    }

}
