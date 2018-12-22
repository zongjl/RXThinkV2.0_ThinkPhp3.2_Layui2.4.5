<?php

/**
 * 短信模板-服务类
 * 
 * @author zongjl
 * @date 2018-07-16
 */
namespace Admin\Service;
use Admin\Model\ServiceModel;
use Admin\Model\SmsTplModel;
class SmsTplService extends ServiceModel {
    function __construct() {
        parent::__construct();
        $this->mod = new SmsTplModel();
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
            $map['title'] = array('like',"%{$keywords}%");
        }
        
        return parent::getList($map);
    }
    
    /**
     * 添加或编辑
     * 
     * @author zongjl
     * @date 2018-07-19
     * (non-PHPdoc)
     * @see \Admin\Model\BaseModel::edit()
     */
    function edit() {
        $data = I('post.', '', 'trim');
        $data['status'] = (isset($data['status']) && $data['status']=="on") ? 1 : 2;
        return parent::edit($data);
    }
    
}