<?php
// +----------------------------------------------------------------------
// | RXThink [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2017-2019 http://rxthink.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 牧羊人 <rxthink@gmail.com>
// +----------------------------------------------------------------------

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
     * @author 牧羊人
     * @date 2018-10-22
     * (non-PHPdoc)
     * @see \Admin\Model\ServiceModel::getList()
     */
    function getList() {
        $param = I("request.");
        
        //订单ID
        $orderId = (int)$param['order_id'];
        
        $map = [
            'order_id'=>$orderId,
        ];
        
        //商品名称
        $name = trim($param['name']);
        if($name) {
            $map['product_name'] = array('like',"%{$name}%");
        }
        
        return parent::getList($map);
    }
    
}