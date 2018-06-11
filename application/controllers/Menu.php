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

    }
    public function index()
    {

    }
    public function edit($id = '')
    {
        var_dump(332);
        $data = array();
       if($id !== ''){
           $this->load->model('menu');
         $data =  $this->menu->get($id);
       }
        $this->load->view('menu/edit',$data);
    }
}