<?php
/**
 * Created by PhpStorm.
 * User: fz-zzg
 * Date: 2018/6/11
 * Time: 15:00
 */

class Nav_model extends MY_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->table = 'blog_nav';
        $this->tablename = 'nav';
    }



}