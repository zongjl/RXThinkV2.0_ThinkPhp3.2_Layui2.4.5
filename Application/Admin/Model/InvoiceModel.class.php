<?php

/**
 * 发票-模型
 * 
 * @author zongjl
 * @date 2018-10-16
 */
namespace Admin\Model;
use Common\Model\CBaseModel;
class InvoiceModel extends CBaseModel {
    function __construct() {
        parent::__construct('invoice');
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
        $info = parent::getInfo($id,true);
        if($info) {
            
            //获取开票用户
            if($info['user_id']) {
                $userMod = new UserModel();
                $userInfo = $userMod->getInfo($info['user_id']);
                $info['mobile'] = $userInfo['mobile'];
            }
            
        }
        return $info;
    }
    
}