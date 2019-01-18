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
 * 短信记录-模型
 * 
 * @author 牧羊人
 * @date 2018-07-20
 */
namespace Admin\Model;
use Common\Model\CBaseModel;
class SmsLogModel extends CBaseModel {
    public $type;
    function __construct() {
        parent::__construct('sms_log');
        
        //短信类型:1用户注册 2修改密码 3找回密码
        $this->type = array(
            1 => '用户注册',
            2 => '修改密码',
            3 => '找回密码',
        );
    }
    
    /**
     * 获取缓存信息
     * 
     * @author 牧羊人
     * @date 2018-07-20
     * (non-PHPdoc)
     * @see \Common\Model\CBaseModel::getInfo()
     */
    function getInfo($id) {
        $info = parent::getInfo($id);
        if($info) {
            
            //短信类型
            if($info['type']) {
                $info['type_name'] = $this->type[$info['type']];
            }
            
            //状态名称
            $info['status_name'] = C('SMS_LOG_STATUS')[$info['status']];
            
        }
        return $info;
    }
    
}