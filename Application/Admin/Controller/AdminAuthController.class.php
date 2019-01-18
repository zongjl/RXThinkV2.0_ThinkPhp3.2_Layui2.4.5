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
 * 权限设置-控制器
 * 
 * @author 牧羊人
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
     * @author 牧羊人
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
     * @author 牧羊人
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