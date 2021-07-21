<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use Illuminate\Support\Facades\Hash;


class LoginController extends Controller
{
    ////提示（laravel用户验证默认是用Hash::make加密）
    public function index(){
        // $manager_data = DB::table('managers')->find(1);
        // dump(Hash::make('123456'));
        // dd(Auth::check());
        if(Auth::check()){
            return redirect('admin/index');
        }
        return view('admin.login.index');
    }

    //登录表单
    public function dologin(Request $request){

        $request_data = $request->only(['username','captcha','password']);

        $check = $this->validate($request,[
            'username' => 'required',
            'password' => 'required',
            'captcha' => 'required|Captcha'
        ]);

        $Auth_check = Auth::attempt(['username' => $request->username, 'password' => $request->password]);
        // dd($Auth_check);
        if($Auth_check){
            // dd(Auth::user()->status != 1);
            //判断账号状态
            if(Auth::user()->status != 1){
                $request->session()->flash('errormsg','账号状态被冻结');
                Auth::logout();
                return redirect()->back();
            }else{
                return redirect('admin/index');
            }
        }else{
            //session闪存错误信息
            $request->session()->flash('errormsg','用户名或者是密码错误');
            return redirect()->back();
        }
        
    }

    //退出登录
    public function logout(){
        // dd('111111111');
        Auth::logout();
        
        return redirect('admin/Login/index');
    }
}
