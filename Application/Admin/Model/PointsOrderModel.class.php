<?php

/**
 * 积分兑换订单-模型
 * 
 * @author zongjl
 * @date 2018-10-25
 */
namespace Admin\Model;
use Common\Model\CBaseModel;
class PointsOrderModel extends CBaseModel {
    function __construct() {
        parent::__construct('points_order');
    }
    
    /**
     * 获取缓存信息
     * 
     * @author zongjl
     * @date 2018-10-25
     * (non-PHPdoc)
     * @see \Common\Model\CBaseModel::getInfo()
     */
    function getInfo($id) {
        $info = parent::getInfo($id);
        if($info) {
            
            //订单类型
            if($info['order_type']) {
                $info['order_type_name'] = C('ORDER_SALES_TYPE')[$info['order_type']];
            }
            
            //运费
            if($info['freight_amount']) {
                $info['format_freight_amount'] = \Zeus::formatToYuan($info['freight_amount']);
            }
            
            //订单状态
            if($info['status']) {
                $info['status_name'] = C('POINTS_ORDER_STATUS')[$info['status']];
            }
            
            //订单来源
            if($info['source']) {
                $info['source_name'] = C('ORDER_SOURCE')[$info['source']];
            }
            
            //发货时间
            if($info['shipping_time']) {
                $info['format_shipping_time'] = date('Y-m-d H:i:s',$info['shipping_time']);
            }
            
            //发货状态
            if($info['shipping_status']) {
                $info['shipping_status_name'] = C('POINTS_ORDER_SHIPPING_STATUS')[$info['shipping_status']];
            }
            
            //签收时间
            if($info['sign_time']) {
                $info['format_sign_time'] = date('Y-m-d H:i:s',$info['sign_time']);
            }
            
            //所属地区
            if($info['district_id']) {
                $cityMod = new CityModel();
                $cityName = $cityMod->getCityName($info['district_id'],'>>');
                $info['city_name'] = $cityName;
            }
            
        }
        return $info;
    }
}