<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\ManagerModel;
use App\Models\Admin\RoleModel;

class ManagerController extends Controller
{
    //
    private $ManagerModel;

    public function __construct(){
        $this->ManagerModel = new ManagerModel;
    }

    public function index(Request $request){
        $where = [];

        $username = $request->get('username');

        $where[] = ['username','like','%'.$username.'%'];

        $data = $this->ManagerModel->where($where)->orderby('id','desc')->paginate(10);

        return view('Admin.Manager.index',['data'=>$data]);
        // dd($data);
    }

    public function add(Request $request,RoleModel $roleModel){

        $pdata = $request->post();
    
        $rolelist = $roleModel::orderby('id','desc')->get(['r_name','id']);

        return view('admin.Manager.add',['rolelist'=>$rolelist]);
        
    }

    public function edit(Request $request){
        $pdata = $request->post();
        // dump($pdata);
        //修改用户状态
        if(isset($pdata['status'])){
            $res = $this->ManagerModel->where('id','=',$pdata['id'])->update(['status'=>$pdata['status']]);
            if($res){
                return response()->json(['code'=>200,'msg'=>'修改成功']);
            }else{
                return response()->json(['code'=>400,'msg'=>'修改失败']);
            }
        }

        return view('admin.Manager.edit');
    }
}
