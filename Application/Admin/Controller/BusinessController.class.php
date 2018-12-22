<?php

/**
 * 商家-控制器
 * 
 * @author zongjl
 * @date 2018-10-19
 */
namespace Admin\Controller;
use Admin\Model\BusinessModel;
use Admin\Service\BusinessService;
class BusinessController extends BaseController {
    function __construct() {
        parent::__construct();
        $this->mod = new BusinessModel();
        $this->service = new BusinessService();
    }
}