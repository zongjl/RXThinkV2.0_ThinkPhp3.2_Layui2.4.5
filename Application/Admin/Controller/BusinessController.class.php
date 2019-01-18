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
 * 商家-控制器
 * 
 * @author 牧羊人
 * @date 2018-10-19
 */
namespace Admin\Controller;
use Admin\Model\BusinessModel;
use Admin\Service\BusinessService;
class BusinessController extends BaseController {
    function __construct() {
        parent::__construct();
        $this->mod = new BusinessModel();
        $this->service = new BusinessService();
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
            'check_status'=>(int)$_GET['check_status'],
        ]);
    }
    
    /**
     * 商家升级审核
     * 
     * @author 牧羊人
     * @date 2019-01-04
     */
    function checkStatus() {
        if(IS_POST) {
            $message = $this->service->checkStatus();
            $this->ajaxReturn($message);
        }
        $this->render();
    }
    
}