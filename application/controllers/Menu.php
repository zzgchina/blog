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
        $this->load->model('menu');
    }
    public function index()
    {

    }
}