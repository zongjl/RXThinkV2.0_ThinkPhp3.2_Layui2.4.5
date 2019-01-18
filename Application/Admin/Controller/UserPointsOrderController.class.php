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
 * 用户积分充值订单-控制器
 * 
 * @author 牧羊人
 * @date 2018-10-18
 */
namespace Admin\Controller;
use Admin\Model\UserPointsOrderModel;
use Admin\Service\UserPointsOrderService;
class UserPointsOrderController extends BaseController {
    function __construct() {
        parent::__construct();
        $this->mod = new UserPointsOrderModel();
        $this->service = new UserPointsOrderService();
    }
}