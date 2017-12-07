<?php

namespace App\Http\Controllers\Admin;
use App\Http\Models\HomeUser;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomeUserInfoAjaxController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ajaxIdentity(Request $request)
    {
        // return(1111);
        $id = $request->input('id');
        // return ($id);
        $data = HomeUser::find($id);
        if ($data->identity == 0) {
            $res = $data->update(['identity' => 1]);
            // $res = $data->save();
//            echo $res;
            if ($res) {
                return ['identity'=>1];
//////                return response()->json(['astatus' => 1]);
////                return json_encode(['astatus' => 1]);
            } else {
                return ['identity'=>0];
//////                return response()->json(['astatus' => 0]);
////                return json_encode(['astatus' => 0]);
            }
        } else {
            $res = $data->update(['identity' => 0]);
            // $res = $data->save();
//            echo $res;
            if ($res) {
                return ['identity'=>0];
//////                return response()->json(['astatus' => 0]);
////                return json_encode(['astatus' => 0]);
            } else {
                return ['identity'=>1];
//////                return response()->json(['astatus' => 1]);
////                return json_encode(['astatus' => 1]);
            }
        }
    }
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ajaxStatus(Request $request)
    {

        $id = $request->input('id');
        $data = HomeUser::find($id);
        if ($data->status == 0) {
            $res = $data->update(['status' => 1]);
            // $res = $data->save();
//            echo $res;
            if ($res) {
                return ['status'=>1];
//////                return response()->json(['astatus' => 1]);
////                return json_encode(['astatus' => 1]);
            } else {
                return ['status'=>0];
//////                return response()->json(['astatus' => 0]);
////                return json_encode(['astatus' => 0]);
            }
        } else {
            $res = $data->update(['status' => 0]);
            // $res = $data->save();
//            echo $res;
            if ($res) {
                return ['status'=>0];
//////                return response()->json(['astatus' => 0]);
////                return json_encode(['astatus' => 0]);
            } else {
                return ['status'=>1];
//////                return response()->json(['astatus' => 1]);
////                return json_encode(['astatus' => 1]);
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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
        //
    }
}
