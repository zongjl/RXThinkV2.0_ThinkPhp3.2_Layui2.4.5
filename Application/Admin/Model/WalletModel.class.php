<?php
// +----------------------------------------------------------------------
// | RXThink [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2017-2019 http://rxthink.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 牧羊人 <rxthink@gmail.com>
// +----------------------------------------------------------------------

/**
 * 钱包-模型
 * 
 * @author 牧羊人
 * @date 2019-01-08
 */
namespace Admin\Model;
use Common\Model\CBaseModel;
class WalletModel extends CBaseModel {
    function __construct() {
        parent::__construct('wallet');
    }
    
    /**
     * 获取缓存信息
     * 
     * @author 牧羊人
     * @date 2019-01-03
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
            
            //账户余额
            $info['format_balance'] = \Zeus::formatToYuan($info['balance']);
            
            //冻结金额
            $info['format_freeze_amount'] = \Zeus::formatToYuan($info['freeze_amount']);
            
            //收入总额
            $info['format_total_amount'] = \Zeus::formatToYuan($info['total_amount']);
            
        }
        return $info;
    }
    
}