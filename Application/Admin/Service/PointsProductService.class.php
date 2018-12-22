<?php

/**
 * 积分商城-服务类
 * 
 * @author zongjl
 * @date 2018-10-16
 */
namespace Admin\Service;
use Admin\Model\ServiceModel;
use Admin\Model\PointsProductModel;
class PointsProductService extends ServiceModel {
    function __construct() {
        parent::__construct();
        $this->mod = new PointsProductModel();
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
        
        //商品名称
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
     * @date 2018-10-19
     * (non-PHPdoc)
     * @see \Admin\Model\ServiceModel::edit()
     */
    function edit() {
        $data = I('post.', '', 'trim');
        $data['is_sale'] = (isset($data['is_sale']) && $data['is_sale']=="on") ? 1 : 2;
        $data['is_hot'] = (isset($data['is_hot']) && $data['is_hot']=="on") ? 1 : 2;
        $data['is_new'] = (isset($data['is_new']) && $data['is_new']=="on") ? 1 : 2;
        $data['is_best'] = (isset($data['is_best']) && $data['is_best']=="on") ? 1 : 2;
        $data['status'] = (isset($data['status']) && $data['status']=="on") ? 1 : 2;

        //商品封面
        $cover = trim($data['cover']);
        if(strpos($cover, "temp")) {
            $data['cover'] = \Zeus::saveImage($cover, 'pointsProduct');
        }
        
        //商品详情
        \Zeus::saveImageByContent($data['content'],$data['name'],"pointsProduct");
        
        return parent::edit($data);
    }
    
}