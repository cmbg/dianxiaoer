<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Cate extends Model
{
    public $table = 'category';
    public $primaryKey = 'cate_id';
    public $guarded = [];
    public $timestamps = false;

    public function good(){
        return $this -> hasOne('App\Http\Models\good','tid','cate_id');
    }
    public static function tree()
    {
        $cates = self:: orderBy('cate_order', 'asc')->get();
        //对分类数据进行格式化（排序、缩进）
        return self:: getTree($cates, 0);
    }
    /**
     * 对分类数据进行格式化（排序、缩进）
     */
    public static function getTree($Category, $pid)
    {
        //存放最终结果的数组
        $arr = [];
        foreach ($Category as $k => $v) {
            //如果是当前遍历的类是一级类
            if ($v->cate_pid == $pid) {
                //复制当前分类的名称给cate_names字段
                $v->cate_names = $v->cate_name;
                $arr[] = $v;

                //找当前一级类下的二级类
                foreach ($Category as $m => $n) {
                    //如果一个分类的pid == $v这个类的id,那这个类就是$v的子类
                    if ($n->cate_pid == $v->cate_id) {
                        $n->cate_names = '|-----' . $n->cate_name;
                        $arr[] = $n;
                    }
                }
            }
        }
        return $arr;
    }
}
