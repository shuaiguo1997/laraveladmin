<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\MenulistModel;
use Illuminate\Support\Facades\Validator;

class MenulistController extends Controller
{
    
    //
    public function index(request $request){
        $where = [];
        // $where['pid'] = '0';
        $menuModel = new MenulistModel;
        $pdatas =  $menuModel->where($where)->orderby('id','Asc')->get();
        //调用公共函数app/Helper/function里的方法getTree
        $getTree = getTree($pdatas);
        foreach ($getTree as $key => $value) {
            $getTree[$key]['title'] = str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;', $value['level']).$value['title'];
        }
        // dd($getTree);
        return view('Admin.menulist.index',['datas'=>$getTree]);
    }

    //添加
    public function add(request $request,$pid=0){
        $menuModel = new MenulistModel;
        if($request->isMethod('post')){

            $post_data = $request->only(['title','url','icon']);
            $validate = $request->validate([
                'title' => 'required',
                'url' => 'required',
                'icon' => 'required',
            ],[
                'title.required' => '标题不能为空',
                'url.required' => '链接不能为空',
                'icon.required' => '请点击选择图标'
            ]);
            $post_data['create_time'] = time();

            if($request->post('pid')){
                $post_data['pid'] = $request->post('pid');
            }

            $res = $menuModel->insert($post_data);
            // $res = true;

            if($res){
                $request->session()->flash('data',['code'=>200,'msg'=>'添加成功']);
            }else{
                $request->session()->flash('data',['code'=>400,'msg'=>'添加失败']);
            }
            // dd($post_data);
        }

        // $pid = $request->get('pid');
        // dd($pid);
        if($pid){
            return view('Admin.menulist.add',['pid'=>$pid]);
        }else{
            return view('Admin.menulist.add');
        }
        
    }

    //编辑
    public function edit(Request $request,$ids=0)
    {
        $menuModel = new MenulistModel;
        if($request->isMethod('post')){
            // dd($request->post());
            $post_data = $request->only(['title','url','icon']);
            $validator = Validator::make($post_data,[
                'title' => 'required',
                'url' => 'required',
                'icon' => 'required',
            ],[
                'title.required' => '标题不能为空',
                'url.required' => '链接不能为空',
                'icon.required' => '请点击选择图标'
            ]);
            // dd($validator->fails());
            //如果校验过程中有错误
            if($validator->fails()){
                //返回json数据
                return response()->json(['code'=>"400","msg"=>$validator->errors()->first()]);
            }

            if($request->post('pid')){
                $post_data['pid'] = $request->post('pid');
            }
            // $id = '';
            if($request->post('id')){
                $id = $request->post('id');
            }
            // dd($post_data);
            
            $res = $menuModel->where('id', $id)->update($post_data);

            if($res){
                return response()->json(['code'=>"200",'msg'=>'修改成功']);
            }else{
                return  response()->json(['code'=>'400','msg'=>'修改成功']);
            }
            // dd($post_data);
        }

        // dd($pid);
        if($ids){
            //父级id和名称
            $where = [];
            $where['pid'] = '0';
            $menuModel = new MenulistModel;
            $pdatas =  $menuModel->where($where)->orderby('id','Asc')->select(['title','id'])->get();
            //此id的值
            $all_data = $menuModel->find($ids);
            // dd($all_data);
            return view('Admin.menulist.edit',['pdatas'=>$pdatas,'all_data'=>$all_data,'id'=>$ids]);
        }
    }

    public function delete(Request $request,MenulistModel $menuModel){
        $id = $request->post('id');

        if(!$id){
            return ajaxreturn('400','参数错误');
        }

        // dd($menuModel->checkdelmenu($id));
        //判断此菜单有被角色绑定，有被绑定禁止删除
        $checkdelmenu = $menuModel->checkdelmenu($id);
        if(!$checkdelmenu){
            return ajaxreturn('400','此菜单有角色权限绑定，请勿删除');
        }

        $res = $menuModel->where('id','=',$id)->delete();
        if($res){
            return ajaxreturn('200','删除成功');
        }else{
            return ajaxreturn('400','删除失败');
        }
        // dd($id);
    }
}
