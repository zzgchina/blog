<?php
/**
 * 菜单列表
 * Created by PhpStorm.
 * User: fz-zzg
 * Date: 2018/6/11
 * Time: 14:54
 */

class Menu extends MY_controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('menuq');
        $this->output->enable_profiler(TRUE);
    }
    public function index()
    {
        echo 'index';
    }

    /**
     * 编辑
     * @param string $id
     */
    public function edit($id = '')
    {
        $data = array();
        if($id !== ''){
            $data =  array_reduce(html_escape($this->menuq->get($id,' id,name,ico,addtime,url,token,pid ')),'array_merge',$data);
        }
        $data['csrf'] = array('name'=>$this->security->get_csrf_token_name(),'hash'=>$this->security->get_csrf_hash());
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name','名称','required|max_length[15]');
        $this->form_validation->set_rules('pid','父ID','required');
        $this->form_validation->set_rules('url','路径','required');
        if($this->form_validation->run() === FALSE)
        {
            $data['menu'] = html_escape($this->menuq->get('',' name ,id ',' where pid=0 '));
            $this->load->view('menu/edit',$data);
        }
        else{
            $data = $this->input->post();
            $res = $this->menuq->add($data);
            if($res['status'])
            {
                redirect('menu/get_list');
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
        $data['list']  = $this->menuq->get('',$this->menuq->table.'.* ,a.name pname',' left join '.$this->menuq->table.' as a on '.$this->menuq->table.'.pid=a.id ');
        $data['list']  = get_son($data['list']);
        $this->load->view('menu/list',$data);
    }
    /**
     * 删除
     */
    public function del()
    {
        $arges = func_get_args();
        $data['id'] = $arges[0];
        $data['token'] = $arges[1];
        $res = $this->menuq->del($data);
        redirect('menu/get_list');
    }

}