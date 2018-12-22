<?php

/**
 * 用户-模型
 * 
 * @author zongjl
 * @date 2018-09-30
 */
namespace Wap\Model;
use Common\Model\CBaseModel;
class UserModel extends CBaseModel {
    function __construct() {
        parent::__construct('user');
    }
    
    /**
     * 获取缓存信息
     * 
     * @author zongjl
     * @date 2018-09-30
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