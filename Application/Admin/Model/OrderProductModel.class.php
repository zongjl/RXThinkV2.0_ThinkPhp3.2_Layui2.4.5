<?php

/**
 * 订单产品-模型
 * 
 * @author zongjl
 * @date 2018-10-22
 */
namespace Admin\Model;
use Common\Model\CBaseModel;
class OrderProductModel extends CBaseModel {
    function __construct() {
        parent::__construct('order_product');
    }
    
    /**
     * 获取缓存信息
     * 
     * @author zongjl
     * @date 2018-10-22
     * (non-PHPdoc)
     * @see \Common\Model\CBaseModel::getInfo()
     */
    function getInfo($id) {
        $info = parent::getInfo($id);
        if($info) {
            
            //商品封面
            if($info['cover']) {
                $info['cover_url'] = IMG_URL . $info['cover'];
            }
            
            //商品单价
            if($info['price']) {
                $info['format_price'] = \Zeus::formatToYuan($info['price']);
            }
            
        }
        return $info;
    }
    
}