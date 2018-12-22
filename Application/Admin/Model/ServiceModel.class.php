<?php

/**
 * 后台模型-基类
 * 
 * @author zongjl
 * @date 2018-06-21
 */
namespace Admin\Model;
use Think\Model;
class ServiceModel extends Model {
    public $_adminInfo;
    public $mod;
    public function __construct() {
        $this->_adminInfo = session('adminInfo');
    }
    
    /**
     * 获取数据列表【基类方法】
     * 
     * @author zongjl
     * @date 2018-07-17
     */
    public function getList($map=array(),$sort="id desc") {
        $map['mark'] = 1;
        
        //获取数据
        $result = $this->mod->where($map)->order($sort)->page(PAGE,PERPAGE)->getField("id",true);
        $list = [];
        if(is_array($result)) {
            foreach ($result as $val) {
                $info = $this->mod->getInfo($val);
                $list[] = $info;
            }
        }
        
        //获取数据总数
        $count = $this->mod->where($map)->count();
        
        //分页设置
        $limit = PERPAGE;
        $Page = new \Think\Page($count, $limit);
        //分页跳转的时候保证查询条件
        foreach($map as $key=>$val) {
            $Page->parameter[$key] = urlencode($val);
        }
        $show = $Page->show();
        
        //设置返回值
        $message = array(
            "msg"   => '操作成功',
            "code"  => 0 ,
            "data"  => $list,
            "count" => $count,
        );
        return $message;
    }
    
    /**
     * 添加或编辑
     * 
     * @author zongjl
     * @date 2018-07-19
     */
    public function edit($data=array(),$is_sql=false) {
        if(!$data) {
            $data = I('post.', '', 'trim');
        }
        $error = '';
        $rowId = $this->mod->edit($data,$error,$is_sql);
        if($rowId) {
            return message();
        }
        return message($error,false);
    }
    
} 