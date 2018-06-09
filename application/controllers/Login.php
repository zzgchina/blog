<?php
/**
 * Created by PhpStorm.
 * User: fz-zzg
 * Date: 2018/6/8
 * Time: 13:34
 */

class Login extends MY_controller
{
    public function index()
    {
        $this->form_validation->set_rules('name','用户名、手机号','required|callback_usercheck');
        $this->form_validation->set_rules('password','密码','required');
        if($this->form_validation->run())
        {

        }

        $data['title'] =  $this->config->item('web_name').html_escape('登录');
        $token['name'] = $this->security->get_csrf_token_name();
        $token['hash'] = $this->security->get_csrf_hash();
        $this->load->view('commom/head',$data);
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
}