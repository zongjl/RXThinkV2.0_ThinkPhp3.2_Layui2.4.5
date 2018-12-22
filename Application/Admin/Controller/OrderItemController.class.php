<?php

/**
 * 订单产品-控制器
 * 
 * @author zongjl
 * @date 2018-10-08
 */
namespace Admin\Controller;
use Admin\Model\OrderItemModel;
use Admin\Service\OrderItemService;
class OrderItemController extends BaseController {
    function __construct() {
        parent::__construct();
        $this->mod = new OrderItemModel();
        $this->service = new OrderItemService();
    }
}