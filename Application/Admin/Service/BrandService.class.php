<?php

/**
 * 品牌-服务类
 * 
 * @author zongjl
 * @date 2018-10-08
 */
namespace Admin\Service;
use Admin\Model\ServiceModel;
use Admin\Model\BrandModel;
class BrandService extends ServiceModel {
    function __construct() {
        parent::__construct();
        $this->mod = new BrandModel();
    }
    
    /**
     * 获取数据列表
     * 
     * @author zongjl
     * @date 2018-10-08
     * (non-PHPdoc)
     * @see \Admin\Model\ServiceModel::getList()
     */
    function getList() {
        $param = I("request.");
        
        $map = [];
        
        //品牌名称
        $name = trim($param['name']);
        if($name) {
            $map['name'] = array('like',"%{$name}%");
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
        $data['status'] = (isset($data['status']) && $data['status']=="on") ? 1 : 2;
        
        //LOGO处理
        $logo = trim($data['logo']);
        if(strpos($logo, "temp")) {
            $data['logo'] = \Zeus::saveImage($logo, 'brand');
        }
        
        return parent::edit($data);
    }
    
}