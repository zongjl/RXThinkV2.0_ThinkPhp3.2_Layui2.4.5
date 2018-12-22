<?php

/**
 * 用户积分记录-模型
 * 
 * @author zongjl
 * @date 2018-10-16
 */
namespace Admin\Model;
use Common\Model\CBaseModel;
class UserPointsRecordModel extends CBaseModel {
    function __construct() {
        parent::__construct('user_points_record');
    }
    
    /**
     * 获取缓存信息
     * 
     * @author zongjl
     * @date 2018-10-16
     * (non-PHPdoc)
     * @see \Common\Model\CBaseModel::getInfo()
     */
    function getInfo($id) {
        $info = parent::getInfo($id);
        if($info) {
            
            //用户信息
            if($info['user_id']) {
                $userMod = new UserModel();
                $userInfo = $userMod->getInfo($info['user_id']);
                $info['mobile'] = $userInfo['mobile'];
            }
            
            //积分类型
            if($info['points_type']) {
                $info['points_type_name'] = C('POINTS_TYPE')[$info['points_type']];
            }
            
        }
        return $info;
    }
    
}