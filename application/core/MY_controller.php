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
        if(!$this->is_login()){
            redirect('login/index');
        }

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

    /**
     * 错误页面
     * @param $msg
     * @param int $time
     * @param string $url
     * @return mixed
     */
    public function my_error($msg,$time = 5,$url = '')
    {
        $data['msg'] = $msg;
        $data['time'] = $time;
        $data['url'] = $url;
        return  $this->load->view('errors/self/error',$data);
    }

    /**
     * 成功页面
     * @param $msg
     * @param int $time
     * @param string $url
     * @return mixed
     */
    public function my_success($msg,$time = 5,$url = '')
    {
        $data['msg'] = $msg;
        $data['time'] = $time;
        $data['url'] = $url;
        return  $this->load->view('errors/self/success',$data);
    }
}