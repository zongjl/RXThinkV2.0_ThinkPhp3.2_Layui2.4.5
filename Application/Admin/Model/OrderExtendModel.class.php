<?php

/**
 * 订单扩展-模型
 * 
 * @author zongjl
 * @date 2018-10-22
 */
namespace Admin\Model;
use Common\Model\CBaseModel;
class OrderExtendModel extends CBaseModel {
    function __construct() {
        parent::__construct('order_extend');
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
            
            //支付凭证
            if($info['payment_voucher']) {
                $info['payment_voucher_url'] = IMG_URL . $info['payment_voucher'];
            }
            
        }
        return $info;
    }
    
}