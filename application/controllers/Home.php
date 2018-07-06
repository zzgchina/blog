<?php
/**
 * Created by PhpStorm.
 * User: fz-zzg
 * Date: 2018/6/29
 * Time: 17:30
 */

class Home extends MY_home
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
       $data['nav']=$this->nav_data;
        $this->load->view('home/home',$data);
    }
}