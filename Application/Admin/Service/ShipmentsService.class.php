<?php

/**
 * 货物物流-服务类
 * 
 * @author zongjl
 * @date 2018-10-23
 */
namespace Admin\Service;
use Admin\Model\ServiceModel;
use Admin\Model\ShipmentsModel;
class ShipmentsService extends ServiceModel {
    function __construct() {
        parent::__construct();
        $this->mod = new ShipmentsModel();
    }
    
    /**
     * 获取数据列表
     * 
     * @author zongjl
     * @date 2018-10-24
     * (non-PHPdoc)
     * @see \Admin\Model\ServiceModel::getList()
     */
    function getList() {
        $param = I("request.");
        
        $map = [];
        
        //快递单号
        $express_no = trim($param['express_no']);
        if($express_no) {
            $map['express_no'] = array('like',"%{$express_no}%");
        }
        
        return parent::getList($map);
    }
    
}