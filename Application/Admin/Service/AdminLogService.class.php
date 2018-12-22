<?php

/**
 * 登录日志-服务类
 * 
 * @author zongjl
 * @date 2018-07-16
 */
namespace Admin\Service;
use Admin\Model\ServiceModel;
use Admin\Model\AdminLogModel;
class AdminLogService extends ServiceModel {
    function __construct() {
        parent::__construct();
        $this->mod = new AdminLogModel();
    }
    
}