<?php

/**
 * 订单产品-服务类
 */
namespace Admin\Service;
use Admin\Model\ServiceModel;
use Admin\Model\OrderProductModel;
class OrderProductService extends ServiceModel {
    function __construct() {
        parent::__construct();
        $this->mod = new OrderProductModel();
    }
    
    /**
     * 获取数据列表
     * 
     * @author zongjl
     * @date 2018-10-22
     * (non-PHPdoc)
     * @see \Admin\Model\ServiceModel::getList()
     */
    function getList() {
        $param = I("request.");

        $map = [];

        //订单ID
        $orderId = (int)$param['order_id'];
        if($orderId) {
            $map['order_id'] = $orderId;
        }
        
        //商品名称
        $keywords = trim($param['keywords']);
        if($keywords) {
            $map['product_name'] = array('like',"%{$keywords}%");
        }
        
        return parent::getList($map);
    }
    
}