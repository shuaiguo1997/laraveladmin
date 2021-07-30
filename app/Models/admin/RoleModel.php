<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\admin\MenulistModel;

class RoleModel extends Model
{
    use HasFactory;
    protected $table = 'role';
    public $timestamps = false;

    public function category(){
        $MenuModel = new MenulistModel;

        $data = $MenuModel::where('pid','=','0')->orderby('id','asc')->get(['title','id','pid']);

        
        $info = [];
        foreach($data as $k => $v){
            $info[$k] = $MenuModel::where('pid','=',$v['id'])->orderby('id','asc')->get(['title','id','pid']);
            $v->son = $info;
        }

        return $data;
    }
}
