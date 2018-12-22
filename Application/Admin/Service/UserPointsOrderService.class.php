<?php

/**
 * 用户积分充值订单-服务类
 * 
 * @author zongjl
 * @date 2018-10-18
 */
namespace Admin\Service;
use Admin\Model\ServiceModel;
use Admin\Model\UserPointsOrderModel;
use Admin\Model\UserModel;
class UserPointsOrderService extends ServiceModel {
    function __construct() {
        parent::__construct();
        $this->mod = new UserPointsOrderModel();
    }
    
    /**
     * 获取数据列表
     * 
     * @author zongjl
     * @date 2018-10-18
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
        
        //类型
        $type = (int)$param['type'];
        if($type) {
            $map['type'] = $type;
        }
        
        //状态
        $status = (int)$param['status'];
        if($status) {
            $map['status'] = $status;
        }
        
        return parent::getList($map);
    }
    
}