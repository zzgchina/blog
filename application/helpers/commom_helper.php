<?php
/**
 * Created by PhpStorm.
 * User: fz-zzg
 * Date: 2018/6/21
 * Time: 17:28
 */


/**
 * 重组数组
 */

function get_son($array,$pid =0,$level = 0,$id_name = 'id',$pid_name = 'pid',$delmelt = '--'){
    $array_new = array();
    foreach ($array as $k=>$v){
        if($pid == $v[$pid_name]){
            $v['delment'] = str_repeat($delmelt,$level);
            $v['level'] = $level+1;

            unset($array[$k]);
//            $array_again = get_son($array,$v[$id_name],$v['level'],$id_name,$pid_name,$delmelt);
//            $array_new = array_merge($array_new,$array_again);
            $v['son'] = get_son($array,$v[$id_name],$v['level'],$id_name,$pid_name,$delmelt);
            $array_new[] = $v;
        }
    }
    return $array_new;
}