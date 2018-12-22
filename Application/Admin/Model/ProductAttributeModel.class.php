<?php

/**
 * 商品属性-模型
 * 
 * @author zongjl
 * @date 2018-10-24
 */
namespace Admin\Model;
use Common\Model\CBaseModel;
class ProductAttributeModel extends CBaseModel {
    function __construct() {
        parent::__construct('product_attribute');
    }
    
    /**
     * 获取缓存信息
     * 
     * @author zongjl
     * @date 2018-10-24
     * (non-PHPdoc)
     * @see \Common\Model\CBaseModel::getInfo()
     */
    function getInfo($id) {
        $info = parent::getInfo($id);
        if($info) {
            //TODO...
        }
        return $info;
    }
    
}