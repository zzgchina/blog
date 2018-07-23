<?php
/**
 * Created by PhpStorm.
 * User: fz-zzg
 * Date: 2018/6/8
 * Time: 13:39
 */

class MY_Controller extends CI_Controller
{
    public $login_status = FALSE;
    public function __construct()
    {
        parent::__construct();
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

    /**
     * 图片上传
     */
    public function do_upload()
    {
        $config['upload_path']      = './upload/img/'.date('Ymd').'/';
        $config['allowed_types']    = 'gif|jpg|png';
        $config['max_size']     = 10000;
        $config['max_width']        = 2400;
        $config['max_height']       = 2400;
        $config['file_name']       = time();

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('userfile'))
        {
          echo json_encode(array('error'=>1,'msg'=>$this->upload->display_errors()));
        }
        else
        {
            echo json_encode(array('errno'=>0,'url'=>'//'.$_SERVER['SERVER_NAME'].$this->upload->data('full_path')));
//            echo '{}';
        }
    }
}