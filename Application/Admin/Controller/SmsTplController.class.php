<?php

/**
 * 短信模板-控制器
 * 
 * @author zongjl
 * @date 2018-07-16
 */
namespace Admin\Controller;
use Admin\Model\SmsTplModel;
use Admin\Service\SmsTplService;
class SmsTplController extends BaseController {
    function __construct() {
        parent::__construct();
        $this->mod = new SmsTplModel();
        $this->service = new SmsTplService();
    }
    
}