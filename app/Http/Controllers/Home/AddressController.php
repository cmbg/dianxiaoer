<?php

namespace App\Http\Controllers\Home;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Http\Models\HomeUser;
use App\Http\Models\Address;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
class AddressController extends Controller
{
    /**
     * [moren description]默认地址为1,普通地址为2,点击页面的设置默认地址,传入id,修改默认状态
     * @return [type] [description]
     */
    public function moren($id)
    {
        $address1= Address::find($id);
        $uid = $address1['uid'];
        $a = Address::where('uid',$uid)->where('isStaAdd',2)->first()->update(['isStaAdd'=>1]);
        $res = $address1->update(['isStaAdd'=>2]);
        $address = Address::get()->where('uid',$uid)->where('isStaAdd',1);//普通地址
         $mraddress = Address::get()->where('uid',$uid)->where('isStaAdd',2);//默认地址
        $arr =[];
        foreach($mraddress as $v){
            $arr['name'] = $v->name;
            $arr['phone'] = $v->phone;
            $arr['address'] = $v->address;
            $arr['id'] = $v->id;
         if($res){
            return redirect('home/address')->with(compact('arr','address'));
        }else{
            return(22222);
            return redirect('home/my_account');
        }
    }
}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $uid = session()->get('user')->uid;
        $address = Address::get()->where('uid',$uid)->where('isStaAdd',1);//普通地址
        $mraddress = Address::get()->where('uid',$uid)->where('isStaAdd',2);//默认地址
        // dd($mraddress->name);
        $arr =[];
        foreach($mraddress as $v){
            $arr['name'] = $v->name;
            $arr['phone'] = $v->phone;
            $arr['address'] = $v->address;
            $arr['id'] = $v->id;
        }
        // dd($address);
      return  view('Home/Home_User/my_address',compact('arr','address'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Home/Home_User/addmy_address');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
         $input = Input::except('_token','save_address');
           $uid = session()->get('user')->uid;
        // dd($input);
        $data = new Address();
        $data->name = $input['name'];
        $data->phone = $input['phone'];
        $data->uid = $uid;
        $data->isStaAdd = 1;
        $str = $input['s_province'] . $input['s_city'].$input['s_county'].$input['address'];
        $data->address = $str ;
         $res = $data->save();
         // dd($res);
          if($res){
            // return (11111);
            return redirect('home/address')->with('msg','添加成功');
        }else{
            return(22222);
            return redirect('admin/homeuser/create')->with('msg','添加失败');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
         $address= Address::find($id);

//        2.返回修改页面（带上要修改的用户记录）
        return view('Home/Home_User/editmy_address',compact('address'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
          $res = Address::find($id)->delete();
        $data = [];
        if($res){
            $data['error'] = 0;
            $data['msg'] ="删除成功";
        }else{
            $data['error'] = 1;
            $data['msg'] ="删除失败";
        }
        return $data;
    }
}
