<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class CheckPostManager extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(Request $Request)
    {
        if($Request->isMethod('POST'))
        {
            
            return [
                //   
                'username' => 'required|alpha_num|unique:manager,username',
                'role_id' => 'required',
                'password' => 'required',
            ];
                
        }else{
            return [];
        }

    }

    public function message(){
        return [
            'username.required' => '用户名称不能为空',
            'username.alpha_num' => '用户名称只能为数字或者字母组成',
            'username.unique:manager,username' => '用户名重名',
            'role_id.required' => '请选择角色名称',
            'password.required' => '密码不能为空',
        ];
    }
}
