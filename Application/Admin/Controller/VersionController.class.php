<?php

/**
 * 版本管理-控制器
 * 
 * @author zongjl
 * @date 2018-07-16
 */
namespace Admin\Controller;
use Admin\Model\VersionModel;
use Admin\Service\VersionService;
class VersionController extends BaseController {
    function __construct() {
        parent::__construct();
        $this->mod = new VersionModel();
        $this->service = new VersionService();
    }
    
}