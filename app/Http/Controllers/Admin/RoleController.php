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
    public function index(Request $Request){
        $where = [];

        $r_name = $Request->get('r_name');

        if($r_name){
            $where[] = ['r_name', 'LIKE', '%'.$r_name.'%'];
        }

        // dump($where);

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
        // dump($data);
        return view('admin.role.index',['data'=>$data,'r_name'=>$r_name]);
    }

    public function add(Request $Request,RoleModel $RoleModel){

        if($Request->isMethod('post')){

            $RoleModel->r_name = $Request->r_name;
            $RoleModel->menu_id = $Request->menu_id;
            $res = $RoleModel->save();
            // $res =1;

            if($res){
                return ajaxreturn('200','添加成功');
            }else{
                return ajaxreturn('400','添加失败');
            }
            // dd($pdata);
        }

        $category = $RoleModel->category();
        // dd($category);
        return view('admin.role.add',['category'=>$category]);
    }

    public function edit(Request $Request,RoleModel $RoleModel,$id=0){

        if($id){
            $data = $RoleModel::find($id);
            $data->menu_id_arr = explode(',',$data->menu_id);
            // dd($data);
            $category = $RoleModel->category();
            return view('admin.Role.edit',['data'=>$data,'category'=>$category]);
        }

        if($Request->isMethod('post')){
            $RoleModel = $RoleModel::find($Request->id);
            $RoleModel->r_name = $Request->r_name;
            $RoleModel->menu_id = $Request->menu_id;
            $res = $RoleModel->save();
            if($res){
                return ajaxreturn('200','修改成功');
            }else{
                return ajaxreturn('400','修改失败');
            }
        }
    }
}
