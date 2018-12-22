<?php

/**
 * 用户积分充值订单-模型
 * 
 * @author zongjl
 * @date 2018-10-18
 */
namespace Admin\Model;
use Common\Model\CBaseModel;
class UserPointsOrderModel extends CBaseModel {
    function __construct() {
        parent::__construct('user_points_order');
    }
    
    /**
     * 获取缓存信息
     * 
     * @author zongjl
     * @date 2018-10-18
     * (non-PHPdoc)
     * @see \Common\Model\CBaseModel::getInfo()
     */
    function getInfo($id) {
        $info = parent::getInfo($id,true);
        if($info) {
            
            //用户信息
            if($info['user_id']) {
                $userMod = new UserModel();
                $userInfo = $userMod->getInfo($info['user_id']);
                $info['mobile'] = $userInfo['mobile'];
            }
            
        }
        return $info;
    }
    
}