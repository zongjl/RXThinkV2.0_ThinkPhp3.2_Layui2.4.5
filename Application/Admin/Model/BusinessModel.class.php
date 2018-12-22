<?php

/**
 * 商家-模型
 * 
 * @author zongjl
 * @date 2018-10-19
 */
namespace Admin\Model;
use Common\Model\CBaseModel;
class BusinessModel extends CBaseModel {
    function __construct() {
        parent::__construct('business');
    }
    
    /**
     * 获取缓存信息
     * 
     * @author zongjl
     * @date 2018-10-19
     * (non-PHPdoc)
     * @see \Common\Model\CBaseModel::getInfo()
     */
    function getInfo($id) {
        $info = parent::getInfo($id);
        if($info) {
            
            //销售总额
            if($info['seller_amount']) {
                $info['format_seller_amount'] = \Zeus::formatToYuan($info['seller_amount']);
            }
            
            //待结算余额
            if($info['balance']) {
                $info['format_balance'] = \Zeus::formatToYuan($info['balance']);
            }
            
            //销售目标
            if($info['seller_target']) {
                $info['format_seller_target'] = \Zeus::formatToYuan($info['seller_target']);
            }
            
            //审核状态
            if($info['check_status']) {
                $info['check_status_name'] = C('CHECK_STATUS_ARR')[$info['check_status']];
            }
            
            //所在城市
            if($info['district_id']) {
                $cityMod = new CityModel();
                $cityName = $cityMod->getCityName($info['district_id'], '>>');
                $info['city_name'] = $cityName;
            }
            
        }
        return $info;
    }
    
}