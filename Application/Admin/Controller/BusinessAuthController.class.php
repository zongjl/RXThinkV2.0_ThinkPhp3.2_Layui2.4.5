<?php

/**
 * 商家认证-控制器
 * 
 * @author zongjl
 * @date 2018-10-23
 */
namespace Admin\Controller;
use Admin\Model\BusinessAuthModel;
use Admin\Service\BusinessAuthService;
class BusinessAuthController extends BaseController {
    function __construct() {
        parent::__construct();
        $this->mod = new BusinessAuthModel();
        $this->service = new BusinessAuthService();
    }
}