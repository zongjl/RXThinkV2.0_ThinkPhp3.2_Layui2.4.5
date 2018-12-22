<?php

/**
 * 会员-控制器
 * 
 * @author zongjl
 * @date 2018-09-08
 */
namespace Admin\Controller;
use Admin\Model\UserModel;
use Admin\Service\UserService;
class UserController extends BaseController {
    function __construct() {
        parent::__construct();
        $this->mod = new UserModel();
        $this->service = new UserService();
    }
    
    /**
     * 设置会员状态
     * 
     * @author zongjl
     * @date 2018-09-08
     */
    function setStatus() {
        if(IS_POST) {
            $message = $this->service->setStatus();
            $this->ajaxReturn($message);
            return ;
        }
    }
    
}