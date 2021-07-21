<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Models\admin\RoleModel;
use App\Http\Controllers\Controller;
use DB;

class RoleController extends Controller
{
    public function __construct(){
        $this->RoleModel = new RoleModel;
    }
    //
    public function index(){
        $where = [];
        // $data = DB::table('')->join('menulist','menulist.id','=','')->where($where)->orderby('id','desc')->paginate(10);
        // return view('admin.role.index',['data'=>$data]);
    }

    public function add(Reaquest $reaquest){

    }

    public function edit(Reaquest $reaquest){

    }
}
