<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\admin\RoleModel;

class MenulistModel extends Model
{
    use HasFactory;
    protected $table = 'menulist';
    public $timestamps = false;

    public function checkdelmenu($id){
        $RoleModel = new RoleModel;

        $menu_id = $RoleModel::pluck('menu_id');

        foreach ($menu_id as $key => $value) {

            $Array_menu_id = explode(",",$value);

            if((in_array($id,$Array_menu_id))){
                return false;
            }
            // dump(in_array($id,$Array_menu_id));
        }

        return true;
    }
}
