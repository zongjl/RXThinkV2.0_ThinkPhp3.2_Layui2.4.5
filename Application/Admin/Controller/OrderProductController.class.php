<?php

/**
 * 订单产品-控制器
 * 
 * @author zongjl
 * @date 2018-10-22
 */
namespace Admin\Controller;
use Admin\Model\OrderProductModel;
use Admin\Service\OrderProductService;
class OrderProductController extends BaseController {
    function __construct() {
        parent::__construct();
        $this->mod = new OrderProductModel();
        $this->service = new OrderProductService();
    }
    
    /**
     * 获取数据列表
     * 
     * @author zongjl
     * @date 2018-10-22
     * (non-PHPdoc)
     * @see \Admin\Controller\BaseController::index()
     */
    function index() {
        $order_id = (int)$_GET['order_id'];
        $this->assign('order_id',$order_id);
        parent::index();
    }
    
}