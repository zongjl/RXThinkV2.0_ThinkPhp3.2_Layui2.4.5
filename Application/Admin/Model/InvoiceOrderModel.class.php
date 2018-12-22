<?php

/**
 * 用户发票申请订单-模型
 * 
 * @author zongjl
 * @date 2018-10-22
 */
namespace Admin\Model;
use Common\Model\CBaseModel;
class InvoiceOrderModel extends CBaseModel {
    function __construct() {
        parent::__construct('user_invoice_order');
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
            
            //订单编号
            if($info['order_num']) {
                $orderList = M("order")->field("order_num")->where([
                    'id'    =>array('in',$info['order_num']),
                    'mark'  =>1,
                ])->select();
                $order = array_key_value($orderList,'order_num');
                $info['order_no'] = implode(',', $order);
            }
            
            //所属地区
            if($info['district_id']) {
                $cityMod = new CityModel();
                $cityName = $cityMod->getCityName($info['district_id'],'>>');
                $info['city_name'] = $cityName;
            }
            
            //开票总额
            if($info['amount']) {
                $info['format_amount'] = \Zeus::formatToYuan($info['amount']);
            }
            
            //运费
            if($info['freight_amount']) {
                $info['format_freight_amount'] = \Zeus::formatToYuan($info['freight_amount']);
            }
            
            //订单来源
            $info['source_name'] = C('ORDER_SOURCE')[$info['source']];
            
            //申请单状态
            $info['status_name'] = C('USER_INVOICE_ORDER')[$info['status']];
            
            //支付时间
            if($info['pay_time']) {
                $info['format_pay_time'] = date('Y-m-d H:i:s',$info['pay_time']);
            }
            
            //发货时间
            if($info['shipping_time']) {
                $info['format_shipping_time'] = date('Y-m-d H:i:s',$info['shipping_time']);
            }
            
            //物流状态
            if($info['shipping_status']) {
                $info['shipping_status_name'] = C('INVOICE_ORDER_SHIPPING_STATUS')[$info['shipping_status']];
            }
            
            //签收时间
            if($info['sign_time']) {
                $info['format_sign_time'] = date('Y-m-d H:i:s',$info['sign_time']);
            }
            
            //发票类型
            if($info['invoice_type']) {
                $info['invoice_type_name'] = C('INVOICE_TYPE')[$info['invoice_type']];
            }
            
        }
        return $info;
    }
    
}