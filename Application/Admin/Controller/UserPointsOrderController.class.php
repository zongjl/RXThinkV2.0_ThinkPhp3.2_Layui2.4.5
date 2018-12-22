<?php

/**
 * 用户积分充值订单-控制器
 * 
 * @author zongjl
 * @date 2018-10-18
 */
namespace Admin\Controller;
use Admin\Model\UserPointsOrderModel;
use Admin\Service\UserPointsOrderService;
class UserPointsOrderController extends BaseController {
    function __construct() {
        parent::__construct();
        $this->mod = new UserPointsOrderModel();
        $this->service = new UserPointsOrderService();
    }
}