<?php

/**
 * 登录日志-模型
 * 
 * @author zongjl
 * @date 2018-07-16
 */
namespace Admin\Model;
use Common\Model\CBaseModel;
class AdminLogModel extends CBaseModel {
    function __construct() {
        parent::__construct('admin_log');
    }
    
    /**
     * 获取缓存信息
     * 
     * @author zongjl
     * @date 2018-07-16
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