<?php

/**
 * 合同订单-模型
 * 
 * @author zongjl
 * @date 2018-10-23
 */
namespace Admin\Model;
use Common\Model\CBaseModel;
class ContractOrderModel extends CBaseModel {
    function __construct() {
        parent::__construct('business_contract_order');
    }
    
    /**
     * 获取缓存信息
     * 
     * @author zongjl
     * @date 2018-10-23
     * (non-PHPdoc)
     * @see \Common\Model\CBaseModel::getInfo()
     */
    function getInfo($id) {
        $info = parent::getInfo($id);
        if($info) {
            
            //开始时间
            if($info['begin_time']) {
                $info['format_begin_time'] = date('Y-m-d H:i:s',$info['begin_time']);
            }
            
            //结束时间
            if($info['end_time']) {
                $info['format_end_time'] = date('Y-m-d H:i:s',$info['end_time']);
            }
            
            //状态
            if($info['status']) {
                $info['status_name'] = C('CONTRACT_ORDER_STATUS')[$info['status']];
            }
            
            //合同类型
            if($info['type']) {
                $info['type_name'] = C('CONTRACT_ORDER_STATUS')[$info['type']];
            }
            
        }
        return $info;
    }
    
}