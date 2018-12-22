<?php

/**
 * 会员升级记录-服务类
 * 
 * @author zongjl
 * @date 2018-08-25
 */
namespace Admin\Service;
use Admin\Model\ServiceModel;
use Admin\Model\UserVipRecordModel;
class UserVipRecordService extends ServiceModel {
    function __construct() {
        parent::__construct();
        $this->mod = new UserVipRecordModel();
    }
    
    /**
     * 获取数据列表
     * 
     * @author zongjl
     * @date 2018-08-25
     * (non-PHPdoc)
     * @see \Admin\Model\ServiceModel::getList()
     */
    function getList() {
        $param = I("request.");
        
        $map = [];
        //查询条件
        $keywords = trim($param['keywords']);
        if($keywords) {
            $map['order_num'] = array('like',"%{$keywords}%");
        }
        
        return parent::getList($map);
    }
    
}