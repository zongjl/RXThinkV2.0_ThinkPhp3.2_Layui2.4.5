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
 * 短信记录-服务类
 * 
 * @author 牧羊人
 * @date 2018-07-20
 */
namespace Admin\Service;
use Admin\Model\ServiceModel;
use Admin\Model\SmsLogModel;
class SmsLogService extends ServiceModel {
    function __construct() {
        parent::__construct();
        $this->mod = new SmsLogModel();
    }
    
    /**
     * 获取数据列表
     * 
     * @author 牧羊人
     * @date 2018-07-20
     * (non-PHPdoc)
     * @see \Admin\Model\BaseModel::getList()
     */
    function getList() {
        
        $param = I("request.");
        
        $map = [];
        
        //手机号码
        $mobile = trim($param['mobile']);
        if($mobile) {
            $map['mobile'] = array('like',"%{$mobile}%");
        }
        
        //发送日期
        $send_date = $param['send_date'];
        if($send_date) {
            $itemArr = explode(' - ', $send_date);
        
            $stime = strtotime(date("Y-m-d 0:00:00",strtotime($itemArr[0])));
            $etime = strtotime(date("Y-m-d 23:59:59",strtotime($itemArr[1])));
            $map['add_time'] = array('between',array($stime,$etime));
        }
        
        return parent::getList($map);
    }
    
}