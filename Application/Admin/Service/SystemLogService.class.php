<?php

/**
 * 系统日志-服务类
 * 
 * @author zongjl
 * @date 2018-07-17
 */
namespace Admin\Service;
use Admin\Model\ServiceModel;
use Admin\Model\SystemLogModel;
class SystemLogService extends ServiceModel {
    function __construct() {
        parent::__construct();
        $this->mod = new SystemLogModel();
    }
}