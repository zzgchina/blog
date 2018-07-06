<?php
/**
 * Created by PhpStorm.
 * User: fz-zzg
 * Date: 2018/6/8
 * Time: 13:39
 */

class MY_home extends CI_Controller
{
    public $nav_data;
    public function __construct()
    {
        parent::__construct();
        $this->load->model('column_model');
        $this->load->model('nav_model');
        //获取导航
        $this->nav_data = $this->nav();
    }

    public function nav()
    {
       $data = $this->nav_model->get('','name,id','where 1=1 ');

       foreach ($data as $k=>$nav)
       {
           $data[$k]['son'] = $this->column_model->get('','name,id',' where pid='.$nav['id']);
       }
       return $data;
    }


}