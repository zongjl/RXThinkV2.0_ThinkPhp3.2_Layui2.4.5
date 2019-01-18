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
 * 钱包流水-控制器
 * 
 * @author 牧羊人
 * @date 2019-01-08
 */
namespace Admin\Controller;
use Admin\Model\WalletTransModel;
use Admin\Service\WalletTransService;
class WalletTransController extends BaseController {
    function __construct() {
        parent::__construct();
        $this->mod = new WalletTransModel();
        $this->service = new WalletTransService();
    }
}