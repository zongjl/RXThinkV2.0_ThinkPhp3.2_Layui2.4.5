<?php

/**
 * 分类-服务类
 * 
 * @author zongjl
 * @date 2018-10-09
 */
namespace Admin\Service;
use Admin\Model\ServiceModel;
use Admin\Model\CateModel;
class CateService extends ServiceModel {
    function __construct() {
        parent::__construct();
        $this->mod = new CateModel();
    }
    
    /**
     * 获取数据列表
     * 
     * @author zongjl
     * @date 2018-10-09
     * (non-PHPdoc)
     * @see \Admin\Model\ServiceModel::getList()
     */
    function getList() {
        $list = $this->mod->getChilds(0,true);
        return message("操作成功",true,$list);
    }
    
    /**
     * 添加或编辑
     * 
     * @author zongjl
     * @date 2018-10-09
     * (non-PHPdoc)
     * @see \Admin\Model\ServiceModel::edit()
     */
    function edit() {
        $data = I('post.', '', 'trim');
        $data['status'] = (isset($data['status']) && $data['status']=="on") ? 1 : 2;
        
        //LOGO处理
        $icon = trim($data['icon']);
        if(strpos($icon, "temp")) {
            $data['icon'] = \Zeus::saveImage($icon, 'category');
        }
        
        return parent::edit($data);
    }
    
}