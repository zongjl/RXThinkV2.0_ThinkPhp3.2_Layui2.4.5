<?php

/**
 * 邮件模板-控制器
 * 
 * @author zongjl
 * @date 2018-07-16
 */
namespace Admin\Controller;
use Admin\Model\EmailTplModel;
use Admin\Service\EmailTplService;
class EmailTplController extends BaseController {
    function __construct() {
        parent::__construct();
        $this->mod = new EmailTplModel();
        $this->service = new EmailTplService();
    }
}