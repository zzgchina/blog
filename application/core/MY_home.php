<?php
/**
 * Created by PhpStorm.
 * User: fz-zzg
 * Date: 2018/6/8
 * Time: 13:39
 */

class CI_dd extends CI_Controller
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
        var_dump($this->nav_model->get('','','where 1=1 '));die;
    }


}