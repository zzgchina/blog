<?php
/**
 * Created by PhpStorm.
 * User: fz-zzg
 * Date: 2018/6/8
 * Time: 13:34
 */

class Login extends CI_controller
{
    public function index()
    {
        $this->form_validation->set_rules('name','用户名、手机号','required|callback_usercheck');
        $this->form_validation->set_rules('password','密码','required');
        $this->form_validation->set_rules('captcha','验证码','required|callback_captchacheck');
        if($this->form_validation->run())
        {
            redirect('');
        }

        $data['title'] =  $this->config->item('web_name').html_escape('登录');
        $token['name'] = $this->security->get_csrf_token_name();
        $token['hash'] = $this->security->get_csrf_hash();
        $this->load->helper('captcha');
        $vals = array(
            'img_path'  => './captcha/',
            'img_url'   => 'http://example.com/captcha/'
        );

        $data['cap'] = create_captcha($vals);
        $this->load->view('login/login',$token);
    }
    public function usercheck()
    {
        $name = $this->input->post('name');
        $password = $this->input->post('password');
        $this->load->model('user');
        if($this->user->checkuser($name,$password))
        {
            return TRUE;
        }
        $this->form_validation->set_message('usercheck','用户名、密码不对');
        return FALSE;

    }
    public function loginout(){
        unset($_SESSION['user'],
        $_SESSION['code']);
        redirect('Login/index');
    }
    public function captcha()
    {
        $this->load->library('captcha',array('width'=>100,'height'=>50,'codeNum'=>4,'fron'=>'./resouse/1.ttf'));
        $this->load->library('session');//加载这个代替类
        $captcha= $this->captcha->getCaptcha();  //生成的验证码值
        $this->session->set_userdata('captcha', strtolower($captcha));   //保存验证码值
        $this->captcha->showImg();               //生成验证码图片
    }
    public function captchacheck($msg)
    {
        $this->form_validation->set_message('captchacheck','验证码不对');

        return  ($msg !== $this->session->userdata('captcha'))? FALSE : TRUE ;

    }
}