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
 * 优惠券-模型
 * 
 * @author 牧羊人
 * @date 2018-11-28
 */
namespace Admin\Model;
use Common\Model\CBaseModel;
class CouponModel extends CBaseModel {
    function __construct() {
        parent::__construct('coupon');
    }
    
    /**
     * 获取缓存信息
     * 
     * @author 牧羊人
     * @date 2018-11-28
     * (non-PHPdoc)
     * @see \Common\Model\CBaseModel::getInfo()
     */
    function getInfo($id) {
        $info = parent::getInfo($id,true);
        if($info) {
            
            //满减金额
            $info['format_amount'] = \Zeus::formatToYuan($info['amount']);
            
            //优惠券面值
            $info['format_face_value'] = \Zeus::formatToYuan($info['face_value']);
            
        }
        return $info;
    }
    
}