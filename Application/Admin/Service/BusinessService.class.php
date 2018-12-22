<?php

/**
 * 商家-服务
 * 
 * @author zongjl
 * @date 2018-10-19
 */
namespace Admin\Service;
use Admin\Model\ServiceModel;
use Admin\Model\BusinessModel;
class BusinessService extends ServiceModel {
    function __construct() {
        parent::__construct();
        $this->mod = new BusinessModel();
    }
    
    /**
     * 获取数据列表
     * 
     * @author zongjl
     * @date 2018-10-19
     * (non-PHPdoc)
     * @see \Admin\Model\ServiceModel::getList()
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
    
    /**
     * 添加或编辑
     * 
     * @author zongjl
     * @date 2018-10-19
     * (non-PHPdoc)
     * @see \Admin\Model\ServiceModel::edit()
     */
    function edit() {
        $data = I('post.', '', 'trim');
        $data['check_status'] = (isset($data['check_status']) && $data['check_status']=="on") ? 1 : 2;
        $data['status'] = (isset($data['status']) && $data['status']=="on") ? 1 : 2;
        return parent::edit($data);
    }
    
}