<?php

/**
 * 合同订单-服务类
 * 
 * @author zongjl
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
     * @author zongjl
     * @date 2018-10-25
     * (non-PHPdoc)
     * @see \Admin\Model\ServiceModel::getList()
     */
    function getList() {
        $param = I("request.");
        
        $map = [];
        
        //手机号码
        $mobile = trim($param['mobile']);
        if($mobile) {
            $map['name'] = $mobile;
        }
        
        return parent::getList($map);
    }
    
    /**
     * 确认订单
     * 
     * @author zongjl
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