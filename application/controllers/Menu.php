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
    public function edit($id = '')
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name','名称','required|max_length[15]');
        $this->form_validation->set_rules('pid','父ID','required');
        $this->form_validation->set_rules('url','路径','required');
        if($this->form_validation->run() === FALSE)
        {
            $data = array();
            if($id !== ''){
                $data =  html_escape($this->menuq->get($id));
            }
            $data['menu'] = html_escape($this->menuq->get('',' name ,id ',' where pid=0 '));
            $this->load->view('menu/edit',$data);
        }
        else{
            $data = $this->input->post();
            $res = $this->menuq->add($data);
            if($res['status'])
            {
                echo $res['msg'];
            }
        }

    }
    //获取菜单list
    public function get_list($id=0)
    {
        $data['list']  = $this->menuq->get('',$this->menuq->table.'.* ,a.name pname',' left join '.$this->menuq->table.' as a on '.$this->menuq->table.'.pid=a.id order by id limit '.$id.',1 ');
        $this->load->library('pagination');
        $page_config['base_url'] =site_url('menu/get_list');
        $page_config['first_url']       = site_url('menu/get_list');
        $page_config['total_rows'] = $this->db->count_all('menu');
        $page_config['per_page'] = 1;
        $page_config['num_links'] =1;
        $page_config['first_link']      = '首页';
        $page_config['last_link']       = '末页';
        $page_config['next_link']       = '<i class="uk-icon-angle-double-right"></i>';
        $page_config['prev_link']       = '<i class="uk-icon-angle-double-left"></i>';
        $page_config['full_tag_open']   = '<ul class="uk-pagination">';
        $page_config['full_tag_close']  = '</ul>';
        $page_config['first_tag_open']  = '<li>';
        $page_config['first_tag_close'] = '</li> ';
        $page_config['last_tag_open']   = ' <li>';
        $page_config['last_tag_close']  = '</li>';
        $page_config['next_tag_open']   = ' <li>';
        $page_config['next_tag_close']  = '</li> ';
        $page_config['prev_tag_open']   = ' <li>';
        $page_config['prev_tag_close']  = '</li> ';
        $page_config['num_tag_open']    = '<li>';
        $page_config['num_tag_close']   = '</li>';
        $page_config['cur_tag_open']    = '<li class="uk-active"><span>';
        $page_config['cur_tag_close']   = '</span></li>';
        $this->pagination->initialize($page_config);
        $data['page_links'] =$this->pagination->create_links();

        $this->load->view('menu/list',$data);
    }

}