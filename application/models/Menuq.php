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
     * 添加
     * @param $data
     * @return array
     */
    public function add($data)
    {
        $msg = array(
           'name'=>$data['name'],
            'ico'=>$data['ico'],
            'pid'=>(int)$data['pid'],
            'addtime'=>time(),
            'url'=>$data['url'],
            'token'=>md5(time()),
        );
        if(!empty($data['token']))
        {
              if(empty($res = $this->get('',' id ',' where id='.$data['id'].' AND token='.$this->db->escape($data['token'])))) return array('status'=>FALSE,'msg'=>'非法参数');
            if($this->db->update($this->tablename,$msg,array('id'=>$res[0]['id']))) return array('status'=>TRUE,'msg'=>'修改成功');
            return array('status'=>FALSE,'msg'=>'修改失败');
        }
        else
        {
            if($this->db->insert($this->tablename,$msg))return array('status'=>TRUE,'msg'=>'添加成功');
            return array('status'=>FALSE,'msg'=>'插入失败');
        }

    }

    /**
     * 删除
     */
    public function del($data)
    {
        if(empty($res = $this->get('',' id ',' where id='.$data['id'].' AND token='.$this->db->escape($data['token'])))) return array('status'=>FALSE,'msg'=>'非法参数');
        $this->db->where('id',$data['id']);
        if($this->db->delete($this->tablename)) return array('status'=>TRUE,'msg'=>'删除成功');
        return array('status'=>FALSE,'msg'=>'连接异常，请稍后再试');
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