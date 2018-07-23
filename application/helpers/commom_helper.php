<?php
/**
 * Created by PhpStorm.
 * User: fz-zzg
 * Date: 2018/6/21
 * Time: 17:28
 */


/**
 * 获取菜单形式的列表
 * @param $array
 * @param int $pid
 * @param int $level
 * @param string $id_name  ID名称
 * @param string $pid_name 父ID名称
 * @param string $delmelt  前缀符号
 * @param bool  $status  数组构造;true:获取菜单形式的列表,false:顺序
 * @return array
 */

function get_son($array,$pid =0,$level = 0,$id_name = 'id',$pid_name = 'pid',$delmelt = '--',$status = TRUE){
    $array_new = array();
    foreach ($array as $k=>$v){
        if($pid == $v[$pid_name]){
            $v['delment'] = str_repeat($delmelt,$level);
            $v['level'] = $level+1;
            unset($array[$k]);
            if($status)
            {
                $v['son'] = get_son($array,$v[$id_name],$v['level'],$id_name,$pid_name,$delmelt,$status);
                $array_new[] = $v;
            }
            else
            {
                $array_new[] = $v;
                $array_again = get_son($array,$v[$id_name],$v['level'],$id_name,$pid_name,$delmelt,$status);
                $array_new = array_merge($array_new,$array_again);
            }

        }
    }
    return $array_new;
}

/**
 * 获取顺序列表
 * @param $array
 * @param int $pid
 * @param int $level
 * @param string $id_name
 * @param string $pid_name
 * @param string $delmelt
 * @return array
 */
function get_son1($array,$pid =0,$level = 0,$id_name = 'id',$pid_name = 'pid',$delmelt = '—'){
    $array_new = array();
    foreach ($array as $k=>$v){
        if($pid == $v[$pid_name]){
            $v['delment'] = str_repeat($delmelt,$level);
            $v['level'] = $level+1;

        }
    }
    return $array_new;
}