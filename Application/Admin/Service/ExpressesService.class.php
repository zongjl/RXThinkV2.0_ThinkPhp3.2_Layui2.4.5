<?php

/**
 * 快递公司-服务类
 * 
 * @author zongjl
 * @date 2018-10-18
 */
namespace Admin\Service;
use Admin\Model\ServiceModel;
use Admin\Model\ExpressesModel;
class ExpressesService extends ServiceModel {
    function __construct() {
        parent::__construct();
        $this->mod = new ExpressesModel();
    }
    
    /**
     * 获取数据列表
     * 
     * @author zongjl
     * @date 2018-10-18
     * (non-PHPdoc)
     * @see \Admin\Model\ServiceModel::getList()
     */
    function getList() {
        $param = I("request.");
        
        $map = [];
        
        //快递公司名称
        $name = trim($param['name']);
        if($name) {
            $map['e_name'] = array('like',"%{$name}%");
        }
        
        return parent::getList($map);
    }
    
    /**
     * 添加或编辑
     *
     * @author zongjl
     * @date 2018-10-18
     * (non-PHPdoc)
     * @see \Admin\Model\ServiceModel::edit()
     */
    function edit() {
        $data = I('post.', '', 'trim');
        $data['e_state'] = (isset($data['e_state']) && $data['e_state']=="on") ? 1 : 2;
        $data['e_order'] = (isset($data['e_order']) && $data['e_order']=="on") ? 1 : 2;
        return parent::edit($data);
    }
    
}