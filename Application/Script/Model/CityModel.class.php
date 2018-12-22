<?php

/**
 * 城市-模型
 * 
 * @author zongjl
 * @date 2018-11-22
 */
namespace Script\Model;
use Common\Model\CBaseModel;
class CityModel extends CBaseModel {
    function __construct() {
        parent::__construct('city');
    }
    
    /**
     * 获取缓存信息
     * 
     * @author zongjl
     * @date 2018-11-22
     * (non-PHPdoc)
     * @see \Common\Model\CBaseModel::getInfo()
     */
    function getInfo($id) {
        $info = parent::getInfo($id);
        if($info) {
            //TODO...
        }
        return $info;
    }
    
}