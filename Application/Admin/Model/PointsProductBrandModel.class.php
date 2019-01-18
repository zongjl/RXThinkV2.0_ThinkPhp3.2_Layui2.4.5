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
 * 积分商城品牌-模型
 * 
 * @author 牧羊人
 * @date 2019-01-11
 */
namespace Admin\Model;
use Common\Model\CBaseModel;
class PointsProductBrandModel extends CBaseModel {
    function __construct() {
        parent::__construct('brand');
    }
    
    /**
     * 获取缓存信息
     * 
     * @author 牧羊人
     * @ate 2019-01-11
     * (non-PHPdoc)
     * @see \Common\Model\CBaseModel::getInfo()
     */
    function getInfo($id) {
        $info = parent::getInfo($id);
        if($info) {
            
            //LOGO
            if($info['logo']) {
                $info['logo_url'] = IMG_URL . $info['logo'];
            }
            
            //品牌类型
            if($info['type']) {
                $info['type_name'] = C("BRAND_TYPE")[$info['type']];
            }
            
        }
        return $info;
    }
    
}