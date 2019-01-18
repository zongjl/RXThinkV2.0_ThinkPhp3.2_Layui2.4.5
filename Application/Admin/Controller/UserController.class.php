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
 * 会员-控制器
 * 
 * @author 牧羊人
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
     * @author 牧羊人
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