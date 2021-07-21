<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\admin\MenulistModel;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\URL;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct(){
        // dd('11111');
        $menuModel = new MenulistModel;
        $where = [];
        $where['pid'] = '0';
        $menulist =  $menuModel->where($where)->orderby('id','Asc')->get();

        foreach ($menulist as $key => $value) {
            $menulist[$key]['son'] = $menuModel->where(['pid'=>$value['id']])->orderby('id','Asc')->get();
            
            if($menulist[$key]['son']){
                foreach ($menulist[$key]['son'] as $k => $v) {
                    $menulist[$key]['son'][$k]['url'] = url('admin/'.$menulist[$key]['son'][$k]['url']);
                }
            }
        }
        // dd($menulist);
        View::share('menulist', $menulist);

    }
}
