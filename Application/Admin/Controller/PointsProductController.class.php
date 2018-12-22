<?php

/**
 * 积分商城-控制器
 * 
 * @author zongjl
 * @date 2018-10-16
 */
namespace Admin\Controller;
use Admin\Model\PointsProductModel;
use Admin\Service\PointsProductService;
class PointsProductController extends BaseController {
    function __construct() {
        parent::__construct();
        $this->mod = new PointsProductModel();
        $this->service = new PointsProductService();
    }
}