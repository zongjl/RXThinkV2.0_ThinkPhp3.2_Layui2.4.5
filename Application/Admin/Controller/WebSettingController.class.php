<?php

/**
 * 网站设置-控制器
 * 
 * @author zongjl
 * @date 2018-09-11
 */
namespace Admin\Controller;
use Admin\Model\WebSettingModel;
use Admin\Service\WebSettingService;
class WebSettingController extends BaseController {
    function __construct() {
        parent::__construct();
        $this->mod = new WebSettingModel();
        $this->service = new WebSettingService();
    }
}