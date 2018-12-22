<?php

/**
 * 系统设置-服务类
 * 
 * @author zongjl
 * @date 2018-07-18
 */
namespace Admin\Service;
use Admin\Model\ServiceModel;
use Admin\Model\AdminSettingModel;
class AdminSettingService extends ServiceModel {
    function __construct() {
        parent::__construct();
        $this->mod = new AdminSettingModel();
    }
}