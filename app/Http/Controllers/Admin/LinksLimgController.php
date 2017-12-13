<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Services\OSS;
use Intervention\Image\ImageManagerStatic as Image;

class LinksLimgController extends CommonController
{
    /**
     * 处理客户端传过来的图片
     *
     */
    public function limg(Request $request)
    {
//        获取客户端传过来的文件
        $file = $request->file('file_upload');
        if($file->isValid()){
            // 获取文件上传对象的后缀名
            $ext = $file->getClientOriginalExtension();
            //生成一个唯一的文件名，保证所有的文件不重名
            $newfile = 'links_'.time().rand(1000,9999).uniqid().'.'.$ext;
            // 获取图片在临时文件中的地址
            $pic = $file->getRealPath();
            //将文件移动到阿里OSS
            OSS::upload($newfile,$file->getRealPath());
            //将上传的图片名称返回到添加，目的是显示图片
            return  config('app.picurl').'/'.$newfile;
        }
    }

    public function editlimg(Request $request)
    {
        //获取客户端传过来的文件
        $file = $request->file('file_upload');
        if($file->isValid()){
            //获取文件上传对象的后缀名
            $ext = $file->getClientOriginalExtension();
            //生成一个唯一的文件名，保证所有的文件不重名
            $newfile = 'links_'.time().rand(1000,9999).uniqid().'.'.$ext;
            //将文件移动到阿里OSS
            OSS::upload($newfile,$file->getRealPath());
            //将上传的图片名称返回到后台编辑页面，目的是显示图片
            return  config('app.picurl').'/'.$newfile;
        }
    }
}
