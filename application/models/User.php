<?php
/**
 * Created by PhpStorm.
 * User: fz-zzg
 * Date: 2018/6/8
 * Time: 17:18
 */
class User extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database('default');
    }
    public function checkuser($name,$password){
        $query = $this->db->query('select name,password_check,token from blog_user where name=?',array($name));
        $re = $query->row_array();
        if(empty($re) OR ($re['password_check'] !== md5($re['token'].$password))){
            return FALSE;
        }
        return TRUE;
    }
}