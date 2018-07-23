<?php
/**
 * Created by PhpStorm.
 * User: fz-zzg
 * Date: 2018/7/23
 * Time: 17:29
 */

class Adv_model extends MY_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->table = 'blog_adv';
        $this->tablename = 'adv';
    }

}