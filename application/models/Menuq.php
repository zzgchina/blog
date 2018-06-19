<?php
/**
 * Created by PhpStorm.
 * User: fz-zzg
 * Date: 2018/6/11
 * Time: 15:00
 */

class Menuq extends CI_Model
{
    public $table = 'blog_menu';
    public $tablename = 'Menu';
    /**
     * 查看菜单
     */
    public function view()
    {

    }

    /**
     * 添加
     */
    public function add($data)
    {
        $msg = array(
           'name'=>$data['name'],
            'ico'=>$data['ico'],
            'pid'=>(int)$data['pid'],
            'addtime'=>time(),
            'url'=>$data['url']
        );

        if($this->db->insert($this->tablename,$msg))return array('status'=>TRUE,'msg'=>'添加成功');
        return array('status'=>FALSE,'msg'=>'插入失败');
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
     * 获取菜单
     * @param $id
     */
    public function get($id = '',$field = '*',$where = ' where id=?' ){
        if($id == '')
        {
            $data = '';
        }
        else
        {
            $data = array($id);
        }

        $query = $this->db->query('select '.$field.' from '.$this->table.$where,$data);
        return $query->result_array();
    }

}