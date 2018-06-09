<?php
/**
 * Created by PhpStorm.
 * User: fz-zzg
 * Date: 2018/6/8
 * Time: 13:39
 */

class MY_controller extends CI_Controller
{
    public $login_status = FALSE;
    public function __construct()
    {
        parent::__construct();
        session_start();
        $this->login_status = $this->is_login();
    }

    /**
     * 检查是否登录
     * @return bool
     */
      public function is_login(){

        if(isset($_SESSION['user']) && isset($_SESSION['code'])){
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }
}