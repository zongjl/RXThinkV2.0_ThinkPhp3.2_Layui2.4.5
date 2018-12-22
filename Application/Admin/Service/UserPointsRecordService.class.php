<?php

/**
 * 用户积分记录-服务类
 * 
 * @author zongjl
 * @date 2018-10-16
 */
namespace Admin\Service;
use Admin\Model\ServiceModel;
use Admin\Model\UserPointsRecordModel;
use Admin\Model\UserModel;
class UserPointsRecordService extends ServiceModel {
    function __construct() {
        parent::__construct();
        $this->mod = new UserPointsRecordModel();
    }
    
    /**
     * 获取数据列表
     * 
     * @author zongjl
     * @date 2018-10-16
     * (non-PHPdoc)
     * @see \Admin\Model\ServiceModel::getList()
     */
    function getList() {
        $param = I("request.");
        
        $map = [];
        
        //手机号码
        $mobile = trim($param['mobile']);
        if($mobile) {
            $userMod = new UserModel();
            $userInfo = $userMod->getRowByAttr([
                'mobile'=>$mobile,
            ]);
            $map['user_id'] = $userInfo['id'];
        }
        
        //积分类型
        $points_type = (int)$param['points_type'];
        if($points_type) {
            $map['points_type'] = $points_type;
        }
        
        return parent::getList($map);
    }
    
}