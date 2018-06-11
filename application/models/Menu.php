<?php
/**
 * Created by PhpStorm.
 * User: fz-zzg
 * Date: 2018/6/11
 * Time: 15:00
 */

class Menu extends CI_Model
{
    public $table = 'blog_menu';
    /**
     * 查看菜单
     */
    public function view()
    {

    }

    /**
     * 编辑
     */
    public function edit()
    {

    }

    /**
     * 更新
     */
    public function update()
    {

    }

    /**
     * 获取单个菜单
     * @param $id
     */
    public function get($id){
        $query = $this->db->query('select * from '.$this->table,'where id=?',array($id));
        return $query->row_array();
    }
}