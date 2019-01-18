<?php
// +----------------------------------------------------------------------
// | RXThink [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2017-2019 http://rxthink.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 牧羊人 <rxthink@gmail.com>
// +----------------------------------------------------------------------

/**
 * 订单产品-控制器
 * 
 * @author 牧羊人
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
     * @author 牧羊人
     * @date 2018-10-22
     * (non-PHPdoc)
     * @see \Admin\Controller\BaseController::index()
     */
    function index() {
        parent::index([
            'order_id'=>(int)$_GET['order_id'],
        ]);
    }
    
}