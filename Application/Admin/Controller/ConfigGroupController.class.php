<?php

/**
 * 配置分组-控制器
 * 
 * @author zongjl
 * @date 2018-09-22
 */
namespace Admin\Controller;
use Admin\Model\ConfigGroupModel;
use Admin\Service\ConfigGroupService;
class ConfigGroupController extends BaseController {
    function __construct() {
        parent::__construct();
        $this->mod = new ConfigGroupModel();
        $this->service = new ConfigGroupService();
    }
}