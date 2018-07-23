<?php
/**
 * Created by PhpStorm.
 * User: fz-zzg
 * Date: 2018/7/6
 * Time: 10:25
 */

class Nav extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('nav_model');
        $this->output->enable_profiler(TRUE);
    }

    /**
     * 编辑
     * @param string $id
     */
    public function edit($id = '')
    {
        $data = array();
        if($id !== ''){
            $data =  array_reduce($this->nav_model->get($id,' name,token,id'),'array_merge',$data);
        }
        $data['csrf'] = array('name'=>$this->security->get_csrf_token_name(),'hash'=>$this->security->get_csrf_hash());
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name','名称','required|max_length[15]');
        if($this->form_validation->run() === FALSE)
        {
            $this->load->view('admin/nav/edit',$data);
        }
        else{
            $data = $this->input->post();
            $msg = array(
                'name'=>$data['name'],
                'token'=>md5(time()),
                'adddate'=>time(),
            );
            $msg = html_escape($msg);
            $res = $this->nav_model->add($data,$msg);
            if($res['status'])
            {
                redirect('nav/get_list');
            }
            else{
                echo 'shibai';
            }
        }

    }

    /**
     * 获取菜单list
     * @param int $id 分页
     */
    public function get_list($id=0)
    {
        $data['list']  = $this->nav_model->get('','* ',' where 1=1 ');
//        $data['list']  = get_son($data['list']);
        $this->load->view('admin/nav/list',$data);
    }
    /**
     * 删除
     */
    public function del()
    {
        $arges = func_get_args();
        $data['id'] = $arges[0];
        $data['token'] = $arges[1];
        $res = $this->nav_model->del($data);
        redirect('menu/get_list');
    }
}