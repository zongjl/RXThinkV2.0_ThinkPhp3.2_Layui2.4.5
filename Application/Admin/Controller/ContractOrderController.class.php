<?php

/**
 * 合同订单-控制器
 * 
 * @author zongjl
 * @date 2018-10-23
 */
namespace Admin\Controller;
use Admin\Model\ContractOrderModel;
use Admin\Service\ContractOrderService;
class ContractOrderController extends BaseController {
    function __construct() {
        parent::__construct();
        $this->mod = new ContractOrderModel();
        $this->service = new ContractOrderService();
    }
    
    /**
     * 合同确认
     * 
     * @author zongjl
     * @date 2018-10-25
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