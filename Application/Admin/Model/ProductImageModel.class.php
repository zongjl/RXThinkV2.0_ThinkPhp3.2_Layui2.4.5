<?php

/**
 * 商品SKU图片
 * 
 * @author zongjl
 * @date 2018-11-01
 */
namespace Admin\Model;
use Common\Model\CBaseModel;
class ProductImageModel extends CBaseModel {
    function __construct() {
        parent::__construct('product_image');
    }
    
    /**
     * 获取缓存信息
     * 
     * @author zongjl
     * @date 2018-11-01
     * (non-PHPdoc)
     * @see \Common\Model\CBaseModel::getInfo()
     */
    function getInfo($id) {
        $info = parent::getInfo($id);
        if($info) {
            
            //商品图集
            if($info['imgs']) {
                $imgsList =  unserialize($info['imgs']);
                foreach ($imgsList as &$row) {
                    $row = IMG_URL . $row;
                }
                $info['imgsList'] = $imgsList;
            }
            
        }
        return $info;
    }
    
}