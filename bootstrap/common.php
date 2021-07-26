<?php
//公共函数文件

//ajax返回
function ajaxreturn($code,$msg){
    return response()->join(['code'=>$code,'msg'=>$msg]);
}