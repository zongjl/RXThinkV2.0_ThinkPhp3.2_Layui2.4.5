<?php

/**
 * 角色管理-服务类
 * 
 * @author zongjl
 * @date 2018-07-16
 */
namespace Admin\Service;
use Admin\Model\ServiceModel;
use Admin\Model\AdminRoleModel;
class AdminRoleService extends ServiceModel {
    function __construct() {
        parent::__construct();
        $this->mod = new AdminRoleModel();
        
    }
    
    /**
     * 获取数据列表
     * 
     * @author zongjl
     * @date 2018-07-17
     * (non-PHPdoc)
     * @see \Admin\Model\BaseModel::getList()
     */
    function getList() {
        $param = I("request.");
        
        $map = [];
        //查询条件
        $keywords = trim($param['keywords']);
        if($keywords) {
            $map['name'] = array('like',"%{$keywords}%");
        }
        
        return parent::getList($map);
        
    }
    
}