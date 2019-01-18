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
 * 商家结算申请单-控制器
 * 
 * @author 牧羊人
 * @date 2018-10-24
 */
namespace Admin\Controller;
use Admin\Model\BusinessSettlementOrderModel;
use Admin\Service\BusinessSettlementOrderService;
class BusinessSettlementOrderController extends BaseController {
    function __construct() {
        parent::__construct();
        $this->mod = new BusinessSettlementOrderModel();
        $this->service = new BusinessSettlementOrderService();
    }
    
    /**
     * 获取数据列表
     * 
     * @author 牧羊人
     * @date 2019-01-11
     * (non-PHPdoc)
     * @see \Admin\Controller\BaseController::index()
     */
    function index() {
        parent::index([
            'status'=>(int)$_GET['status'],
        ]);
    }
    
    /**
     * 订单确认
     * 
     * @author 牧羊人
     * @date 2018-10-24
     */
    function confirmOrder() {
        if(IS_POST) {
            $message = $this->service->confirmOrder();
            $this->ajaxReturn($message);
            return ;
        }
        $id = I("get.id",0);
        if($id) {
            $info = $this->mod->getInfo($id);
            $this->assign('info',$info);
        }
        $this->render();
    }
    
}