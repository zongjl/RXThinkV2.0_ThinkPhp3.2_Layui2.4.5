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
 * 合同订单-服务类
 * 
 * @author 牧羊人
 * @date 2018-10-23
 */
namespace Admin\Service;
use Admin\Model\ServiceModel;
use Admin\Model\ContractOrderModel;
class ContractOrderService extends ServiceModel {
    function __construct() {
        parent::__construct();
        $this->mod = new ContractOrderModel();
    }
    
    /**
     * 获取数据列表
     * 
     * @author 牧羊人
     * @date 2018-10-25
     * (non-PHPdoc)
     * @see \Admin\Model\ServiceModel::getList()
     */
    function getList() {
        $param = I("request.");
        
        $map = [];
        
        //合同状态
        $status = (int)$param['status'];
        if($status) {
            $map['status'] = $status;
        }
        
        //手机号码
        $mobile = trim($param['mobile']);
        if($mobile) {
            $map['mobile'] = $mobile;
        }
        
        return parent::getList($map);
    }
    
    /**
     * 确认订单
     * 
     * @author 牧羊人
     * @date 2018-10-25
     */
    function confirmOrder() {
        $data = I('post.', '', 'trim');
        if(!$data['id']) {
            return message('订单信息不存在',false);
        }
        return parent::edit();
    }
    
}