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
 * 用户优惠券额度交易记录-控制器
 * 
 * @author 牧羊人
 * @date 2019-01-09
 */
namespace Admin\Controller;
use Admin\Model\UserCouponWalletModel;
use Admin\Service\UserCouponWalletService;
class UserCouponWalletController extends BaseController {
    function __construct() {
        parent::__construct();
        $this->mod = new UserCouponWalletModel();
        $this->service = new UserCouponWalletService();
    }
}