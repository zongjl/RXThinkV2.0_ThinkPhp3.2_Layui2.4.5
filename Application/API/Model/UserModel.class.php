<?php

/**
 * 用户-模型
 * 
 * @author zongjl
 * @date 2018-08-29
 */
namespace API\Model;
use Common\Model\CBaseModel;
class UserModel extends CBaseModel {
    function __construct() {
        parent::__construct('user');
    }
    
    /**
     * 获取缓存信息
     * 
     * @author zongjl
     * @date 2018-08-29
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