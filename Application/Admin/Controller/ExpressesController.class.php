<?php

/**
 * 快递公司-控制器
 * 
 * @author zongjl
 * @date 2018-10-18
 */
namespace Admin\Controller;
use Admin\Model\ExpressesModel;
use Admin\Service\ExpressesService;
class ExpressesController extends BaseController {
    function __construct() {
        parent::__construct();
        $this->mod = new ExpressesModel();
        $this->service = new ExpressesService();
    }
}