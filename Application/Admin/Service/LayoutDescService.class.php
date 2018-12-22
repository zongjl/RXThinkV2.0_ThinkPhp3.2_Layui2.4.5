<?php

/**
 * 布局描述-服务类
 * 
 * @author zongjl
 * @date 2018-07-17
 */
namespace Admin\Service;
use Admin\Model\ServiceModel;
use Admin\Model\LayoutDescModel;
class LayoutDescService extends ServiceModel {
    function __construct() {
        parent::__construct();
        $this->mod = new LayoutDescModel();
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
            $map['loc_desc'] = array('like',"%{$keywords}%");
        }
        
        return parent::getList($map);
    }
    
    /**
     * 添加或编辑
     * 
     * @author zongjl
     * @date 2018-09-19
     * (non-PHPdoc)
     * @see \Admin\Model\ServiceModel::edit()
     */
    function edit() {
        $data = I('post.', '', 'trim');
        $data['page_id'] = $data['item_id'];
        unset($data['item_id']);
        
        return parent::edit($data);
    }
    
}