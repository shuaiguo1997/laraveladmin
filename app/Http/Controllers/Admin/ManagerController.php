<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\ManagerModel;
use App\Models\Admin\RoleModel;
use App\Http\Requests\Admin\CheckPostManager;
use Illuminate\Support\Facades\Hash;

class ManagerController extends Controller
{
    //
    // private $ManagerModel;

    public function __construct(){
        
    }

    public function index(Request $request,ManagerModel $ManagerModel){
        $where = [];

        $username = $request->get('username');

        $where[] = ['username','like','%'.$username.'%'];

        $data = $ManagerModel->where($where)->orderby('id','desc')->paginate(10);

        return view('Admin.Manager.index',['data'=>$data]);
        // dd($data);
    }

    public function adds(RoleModel $roleModel,CheckPostManager $request){
        // dd('2222222222');
        if($request->isMethod('post')){
            $roleModel->password = Hash::make($request->password);
            $roleModel->role_id = $request->role_id;
            $roleModel->username = $request->username;
            dd($roleModel);
            $res = $roleModel->save();
        }
    
        $rolelist = $roleModel::orderby('id','desc')->get(['r_name','id']);
        // dd($rolelist);

        return view('Admin.Manager.adds',['rolelist'=>$rolelist]);
        
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
