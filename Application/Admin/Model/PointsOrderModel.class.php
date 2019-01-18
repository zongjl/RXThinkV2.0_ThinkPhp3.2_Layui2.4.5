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
 * 积分兑换订单-模型
 * 
 * @author 牧羊人
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
     * @author 牧羊人
     * @date 2018-10-25
     * (non-PHPdoc)
     * @see \Common\Model\CBaseModel::getInfo()
     */
    function getInfo($id) {
        $info = parent::getInfo($id);
        if($info) {
            
            //商品信息
            if($info['product_id']) {
                $pointProductMod = new PointsProductModel();
                $pointProductInfo = $pointProductMod->getInfo($info['product_id']);
                $info['product_name'] = $pointProductInfo['name'];
            }
            
            //运费
            if($info['freight_amount']) {
                $info['format_freight_amount'] = \Zeus::formatToYuan($info['freight_amount']);
            }
            
            //订单状态
            if($info['status']) {
                $info['status_name'] = C('POINTS_ORDER_STATUS')[$info['status']];
            }
            
            //发货时间
            if($info['shipping_time']) {
                $info['format_shipping_time'] = date('Y-m-d H:i:s',$info['shipping_time']);
            }
            
            //签收时间
            if($info['sign_time']) {
                $info['format_sign_time'] = date('Y-m-d H:i:s',$info['sign_time']);
            }
            
            //取消时间
            if($info['cancel_time']) {
                $info['format_cancel_time'] = date('Y-m-d H:i:s',$info['cancel_time']);
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