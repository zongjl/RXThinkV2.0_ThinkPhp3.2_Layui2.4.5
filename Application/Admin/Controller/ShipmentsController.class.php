<?php

/**
 * 货物物流-控制器
 * 
 * @author zongjl
 * @date 2018-10-23
 */
namespace Admin\Controller;
use Admin\Model\ShipmentsModel;
use Admin\Service\ShipmentsService;
class ShipmentsController extends BaseController {
    function __construct() {
        parent::__construct();
        $this->mod = new ShipmentsModel();
        $this->service = new ShipmentsService();
    }
}