<?php

/**
 * 会员升级记录-模型
 * 
 * @author zongjl
 * @date 2018-08-25
 */
namespace Admin\Model;
use Common\Model\CBaseModel;
class UserVipRecordModel extends CBaseModel {
    function __construct() {
        parent::__construct('user_vip_record');
    }
    
    /**
     * 获取缓存信息
     * 
     * @author zongjl
     * @date 2018-08-25
     * (non-PHPdoc)
     * @see \Common\Model\CBaseModel::getInfo()
     */
    function getInfo($id) {
        $this->_cacheDelete($id);
        $info = parent::getInfo($id);
        if($info) {
            
            //获取充值用户
            if($info['user_id']) {
                $userInfo = M("user")->find($info['user_id']);
                $info['mobile'] = $userInfo['mobile'];
            }
            
            //开始时间
            if($info['start_time']) {
                $info['format_start_time'] = date('Y-m-d H:i:s',$info['start_time']);
            }
            
            //结束时间
            if($info['end_time']) {
                $info['format_end_time'] = date('Y-m-d H:i:s',$info['end_time']);
            }
            
            //充值费用
            if($info['total_fee']) {
                $info['format_total_fee'] = \Zeus::formatToYuan($info['total_fee']);
            }
            
            //支付时间
            if($info['pay_time']) {
                $info['format_pay_time'] = date('Y-m-d H:i:s',$info['pay_time']);
            }
            
        }
        return $info;
    }
    
}