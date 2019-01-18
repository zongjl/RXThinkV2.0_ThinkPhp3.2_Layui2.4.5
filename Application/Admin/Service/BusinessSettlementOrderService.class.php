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
 * 商家结算申请单-服务类
 * 
 * @author 牧羊人
 * @date 2018-10-24
 */
namespace Admin\Service;
use Admin\Model\ServiceModel;
use Admin\Model\BusinessSettlementOrderModel;
class BusinessSettlementOrderService extends ServiceModel {
    function __construct() {
        parent::__construct();
        $this->mod = new BusinessSettlementOrderModel();
    }
    
    /**
     * 获取数据列表
     * 
     * @author 牧羊人
     * @date 2019-01-07
     * (non-PHPdoc)
     * @see \Admin\Model\ServiceModel::getList()
     */
    function getList() {
        $param = I("request.");
        
        $map = [];
        
        //订单状态
        $status = (int)$param['status'];
        if($status) {
            $map['status'] = $status;
        }
        
        //手机号码
        $mobile = trim($param['mobile']);
        if($mobile) {
            $map['mobile'] = array('like',"%{$mobile}%");
        }
        
        return parent::getList($map);
    }
    
    /**
     * 订单确认
     * 
     * @author 牧羊人
     * @date 2018-10-24
     */
    function confirmOrder() {
        $data = I('post.', '', 'trim');
        if(!$data['id']) {
            return message('订单信息不存在',false);
        }
        return parent::edit();
    }
    
}