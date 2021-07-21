<?php
/**
 * 公用的方法  返回json数据，进行信息的提示
 * @param $status 状态
 * @param string $message 提示信息
 * @param array $data 返回数据
 */

//无限极分类
function getTree($array,$pid=0,$level=0){
    //申明静态数组,避免递归调用时,多次声明导致数组覆盖
    static $list = [];
    foreach ($array as $key => $value) {
        if($value['pid']==$pid){
            $value['level'] = $level;
            $list[] = $value;
            unset($array[$key]);
            //开始递归,查找父ID为该节点ID的节点,级别则为原级别+1
            getTree($array, $value['id'], $level+1);
        }
    }
    return $list;
}
