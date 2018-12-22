<?php

/**
 * 系统设置-控制器
 * 
 * @author zongjl
 * @date 2018-07-18
 */
namespace Admin\Controller;
use Admin\Model\AdminSettingModel;
use Admin\Service\AdminSettingService;
class AdminSettingController extends BaseController {
    function __construct() {
        parent::__construct();
        $this->mod = new AdminSettingModel();
        $this->service = new AdminSettingService();
    }
}