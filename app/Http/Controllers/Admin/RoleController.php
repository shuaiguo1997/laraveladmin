<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Models\admin\RoleModel;
use App\Http\Controllers\Controller;
// use App\
use DB;

class RoleController extends Controller
{
    public function __construct(){
        $this->RoleModel = new RoleModel;
    }
    //
    public function index(){
        $where = [];
        $data = $this->RoleModel::where($where)->orderby('id','desc')->paginate(10);
        foreach ($data as $key => $value) {
            $info = $value->title;//定义中间变量
            $arr_title = explode(',',$value['menu_id']);
            foreach ($arr_title as $k => $v) {
                // dump($v);
                $info[$v] = DB::table('menulist')->where('id','=',$v)->value('title');
            }
            $value->title = implode(",",$info);
        }
        // dd($data);
        return view('admin.role.index',['data'=>$data]);
    }

    public function add(Request $Request){
        return view('admin.role.add');
    }

    public function edit(Request $Request){

    }
}
