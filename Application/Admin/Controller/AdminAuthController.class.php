<?php

/**
 * 权限设置-控制器
 * 
 * @author zongjl
 * @date 2018-07-19
 */
namespace Admin\Controller;
use Admin\Service\AdminAuthService;
class AdminAuthController extends BaseController {
    function __construct() {
        parent::__construct();
        $this->service = new AdminAuthService();
    }
    
    /**
     * 获取数据列表
     * 
     * @author zongjl
     * @date 2018-07019
     * (non-PHPdoc)
     * @see \Admin\Controller\BaseController::index()
     */
    function index() {
        if(IS_POST) {
            $message = $this->service->getList();
            $this->ajaxReturn($message);
            return ;
        }
        
        //参数接收
        $type = I("get.type",0);
        $typeId = I("get.type_id",0);
        $this->assign('type',$type);
        $this->assign("type_id",$typeId);
        $this->render();
    }
    
    /**
     * 保存权限设置
     * 
     * @author zongjl
     * @date 2018-07-19
     */
    function setAuth() {
        if(IS_POST) {
            $message = $this->service->setAuth();
            $this->ajaxReturn($message);
            return ;
        }
    }
    
}