<?php

/**
 * 网站设置-模型
 * 
 * @author zongjl
 * @date 2018-09-11
 */
namespace Admin\Model;
use Common\Model\CBaseModel;
class WebSettingModel extends CBaseModel {
    function __construct() {
        parent::__construct('web_setting');
    }
    
    /**
     * 获取缓存信息
     * 
     * @author zongjl
     * @date 2018-09-11
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