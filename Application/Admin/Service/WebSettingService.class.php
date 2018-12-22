<?php

/**
 * 网站设置-服务类
 * 
 * @author zongjl
 * @date 2018-09-11
 */
namespace Admin\Service;
use Admin\Model\ServiceModel;
use Admin\Model\WebSettingModel;
class WebSettingService extends ServiceModel {
    function __construct() {
        parent::__construct();
        $this->mod = new WebSettingModel();
    }
}