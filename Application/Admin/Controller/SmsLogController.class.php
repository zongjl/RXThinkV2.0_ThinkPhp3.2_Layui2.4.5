<?php

/**
 * 短信记录-控制器
 * 
 * @author zongjl
 * @date 2018-07-20
 */
namespace Admin\Controller;
use Admin\Model\SmsLogModel;
use Admin\Service\SmsLogService;
class SmsLogController extends BaseController {
    function __construct() {
        parent::__construct();
        $this->mod = new SmsLogModel();
        $this->service = new SmsLogService();
    }
    
}