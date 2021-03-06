<?php
/**
 * Created by PhpStorm.
 * User: fz-zzg
 * Date: 2018/7/23
 * Time: 17:22
 */

class Adv extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('adv_model');
        $this->output->enable_profiler(FALSE);
    }


    //列表
    public function index($id=0)
    {
        $num = 10;//每页个数
        $data['list']  = $this->adv_model->get('','id,url,position,adddate,status','where 1');
        $this->load->library('pagination');
        $page_config['base_url'] =site_url('adv/index');
        $page_config['first_url']       = site_url('adv/index');
        $page_config['total_rows'] = $this->db->count_all('adv');
        $page_config['per_page'] = $num;
        $page_config['num_links'] =1;
        $page_config['first_link']      = '首页';
        $page_config['last_link']       = '末页';//首页，末页出现和num_links,有关
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

        $this->load->view('admin/adv/list',$data);
    }

    /**
     * 编辑
     * @param string $id
     */
    public function edit($id = '')
    {
        $data = array();
        if($id !== ''){
//           array_reduce 二维转化一维数组
            $data =  array_reduce(html_escape($this->adv_model->get($id,' *')),'array_merge',$data);
        }

        $data['csrf'] = array('name'=>$this->security->get_csrf_token_name(),'hash'=>$this->security->get_csrf_hash());
        $this->form_validation->set_rules('name','名称','required|max_length[15]');
        if($this->form_validation->run() === FALSE)
        {

            $this->load->view('admin/adv/edit',$data);
        }
        else{
            $data = $this->input->post();
            $res = $this->adv_model->add($data);
            if($res['status'])
            {
                $this->load->view('errors/self/success',array('url'=>'admin/adv/index','time'=>5,'msg'=>$res['msg']));
            }
            else
            {
                $this->load->view('errors/self/error',array('url'=>'admin/adv/edit','time'=>5,'msg'=>$res['msg']));
            }
        }

    }


    /**
     * 删除
     */
    public function del()
    {
        $arges = func_get_args();
        $data['id'] = $arges[0];
        $data['token'] = $arges[1];
        $res = $this->column->del($data);
        redirect('column/index');
    }
}