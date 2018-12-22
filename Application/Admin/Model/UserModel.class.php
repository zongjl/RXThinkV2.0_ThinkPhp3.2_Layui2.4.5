<?php

/**
 * 会员-模型
 * 
 * @author zongjl
 * @date 2018-09-08
 */
namespace Admin\Model;
use Common\Model\CBaseModel;
class UserModel extends CBaseModel {
    function __construct() {
        parent::__construct('user');
    }
    
    /**
     * 获取缓存信息
     * 
     * @author zongjl
     * @date 2018-09-08
     * (non-PHPdoc)
     * @see \Common\Model\CBaseModel::getInfo()
     */
    function getInfo($id) {
        $this->_cacheDelete($id);
        $info = parent::getInfo($id);
        if($info) {
            
            //头像
            if($info['avatar']) {
                $info['avatar_url'] = IMG_URL . $info['avatar'];
            }
            
            //会员等级
            $info['level_name'] = C('USER_LEVEL')[$info['level']];
            
            //用户类型
            $info['type_name'] = C('USER_VIP_TYPE')[$info['type']];
            
            //认证状态
            $info['indentity_stauts_name'] = C('USER_IDENTITY_STATUS')[$info['indentity_stauts']];
            
        }
        return $info;
    }
    
}