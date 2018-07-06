<?php
/**
 * Created by PhpStorm.
 * User: fz-zzg
 * Date: 2018/6/29
 * Time: 17:30
 */

class Home extends CI_Controller
{
    public function index()
    {

        $this->load->view('home/home');
    }
}