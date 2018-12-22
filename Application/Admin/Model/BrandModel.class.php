<?php

/**
 * 品牌-模型
 * 
 * @author zongjl
 * @date 2018-10-08
 */
namespace Admin\Model;
use Common\Model\CBaseModel;
class BrandModel extends CBaseModel {
    function __construct() {
        parent::__construct('brand');
    }
    
    /**
     * 获取缓存信息
     * 
     * @author zongjl
     * @date 2018-10-08
     * (non-PHPdoc)
     * @see \Common\Model\CBaseModel::getInfo()
     */
    function getInfo($id) {
        $info = parent::getInfo($id,true);
        if($info) {
            
            //LOGO 
            if($info['logo']) {
                $info['logo_url'] = IMG_URL . $info['logo'];
            }
            
        }
        return $info;
    }
    
}