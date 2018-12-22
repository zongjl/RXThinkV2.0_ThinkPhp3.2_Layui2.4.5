<?php

/**
 * 配置分组-模型
 * 
 * @author zongjl
 * @date 2018-09-22
 */
namespace Admin\Model;
use Common\Model\CBaseModel;
class ConfigGroupModel extends CBaseModel {
    function __construct() {
        parent::__construct('config_group');
    }
    
    /**
     * 获取缓存信息
     * 
     * @author zongjl
     * @date 2018-09-22
     * (non-PHPdoc)
     * @see \Common\Model\CBaseModel::getInfo()
     */
    function getInfo($id) {
        $info = parent::getInfo($id,true);
        if($info) {
            //TODO...
        }
        return $info;
    }
    
}