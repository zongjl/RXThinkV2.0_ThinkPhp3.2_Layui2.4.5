<?php

/**
 * 配置-控制器
 * 
 * @author zongjl
 * @date 2018-09-22
 */
namespace Admin\Controller;
use Admin\Model\ConfigModel;
use Admin\Service\ConfigService;
class ConfigController extends BaseController {
    function __construct() {
        parent::__construct();
        $this->mod = new ConfigModel();
        $this->service = new ConfigService();
    }
}